import io
import base64
import os
import PIL
from keras.preprocessing.image import array_to_img
from keras.models import model_from_json
from keras.models import load_model
import cv2
import numpy as np
import tensorflow as tf
import matplotlib.pyplot as plt
import mysql.connector as sqlc
from keras.preprocessing.image import img_to_array
from tensorflow.keras import Model, Input, regularizers
import pathlib

# load model
full_path = os.path.realpath(__file__)
current_directory = os.path.dirname(full_path)
autoencoder = load_model(current_directory + "/model.h5")


def database_connection():
    """
    This function is used to access the database which will then retrieve the images and convert it from binary data
    into an image. It will then convert the image into an array and resize it to a appropriate size then normalize it
    to a value between 0 and 1 which will later be used for prediction. The predicted value will be turned from array
    into image and then the image will be converted into binary which will then be updated into the database.
    """
    connection = sqlc.connect(host='localhost',
                              database='web_app',
                              user='root',
                              password='')

    MyCursor = connection.cursor()

    query = "SELECT id FROM image_uploads WHERE id IS NOT NULL AND processed_image IS NULL"

    MyCursor.execute(query)

    SIZE = 80

    data = MyCursor.fetchall()
    for i in range(len(data)):
        temp_id = data[i][0]
        image = get_image(temp_id)

        img_val = normalize_image(image, SIZE)

        predictions = autoencoder.predict(img_val)


        convert_to_image(predictions)
        
        # change the image into binary
        blob_value = open("preprocessed_image.jpg", 'rb').read()   
        encodestring = base64.b64encode(blob_value)
        
        # update the image into database
        sql = "UPDATE image_uploads SET processed_image = %s WHERE id=%s"
        args = (encodestring, temp_id)
        MyCursor.execute(sql, args)
        connection.commit()



def get_image(id):
    """
    This function retrieve the image from database and convert it from binary data to pil image
    """
    connection = sqlc.connect(host='localhost',
                              database='web_app',
                              user='root',
                              password='')

    MyCursor = connection.cursor()

    query = "SELECT uploaded_image FROM image_uploads where id = %s"

    args = (id,)

    MyCursor.execute(query, args)

    data = MyCursor.fetchall()

    image = data[0][0]

    binary_data = base64.b64decode(image)

    image = PIL.Image.open(io.BytesIO(binary_data))

    return image


def normalize_image(image, SIZE):
    """
    This function resizes the image and convert it into array, then convert it into grayscale if it is not and normalizes the
    data.
    """

    # Resize the image
    img = image.resize((SIZE, SIZE))

    # convert image into array
    img_array = img_to_array(img)

    shp = img_array.shape

    # if the image is not in grayscale, change it to grayscale
    if shp[2] != 1:
        gray = cv2.cvtColor(img_array, cv2.COLOR_BGR2GRAY)
        img_array = gray

    # Normalize the image
    standard_val = np.reshape(img_array, (1, SIZE, SIZE, 1))
    standard_val = standard_val.astype('float32') / 255.

    return standard_val


def convert_to_image(predictions):
    """
    This function convert the image array back to image resize it into an appropriate size and save the image as png
    """
    img_pil = array_to_img(predictions[0])

    img_pil = img_pil.resize((250, 250))
    img_pil.save("preprocessed_image.jpg")

database_connection()
