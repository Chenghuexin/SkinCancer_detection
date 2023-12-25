import cv2
import numpy as np
import tensorflow as tf
import sys

# picture = cv2.imread('./upload/ISIC_0024306.jpg')
# picture = cv2.resize(picture, (28, 28))
# picture = np.expand_dims(picture, axis=0)
# print(picture.shape)


# model =  tf.keras.models.load_model('./SkinCancer.h5')
# result = model.predict(picture)

# print(result)

# pred = np.argmax(result , axis=1)
# print(pred[0])

if __name__ == '__main__':
    picture_path = sys.argv[1]
    picture = cv2.imread(picture_path)

    picture = cv2.resize(picture, (28, 28))
    picture = np.expand_dims(picture, axis=0)

    model =  tf.keras.models.load_model('./SkinCancer.h5')
    result = model.predict(picture)
    pred = np.argmax(result , axis=1)
    print(pred[0])