#!/Python27/python
from PIL import Image
import pytesseract
import cgitb
import cgi
import sys
import os
import json
import re
import cv2, numpy
from pytesseract import image_to_string

cgitb.enable(display=0, logdir="logs/icici")

"Content-type: text/html"
print
print "<html><head>"
print ""
print "</head><body>"
temp=sys.argv[1]
filepath=os.path.join("upload/",temp)
filename, file_extension = os.path.splitext(temp)


img = Image.open(filepath)
img.load()
i = pytesseract.image_to_string(img)

#Bank name
f1 = re.search('of (.+?) Bank', i).group(1)
#print f1

#Account Holder name
try:
	f4=re.search('(.+?)\nPlease',i).group(1)
except Exception:
	try:
		f4=re.search('(.+?)\n\nPlease',i).group(1)
	except Exception:
		f4= "Mismatch"
#print f4



#ifsc code
image = cv2.imread(filepath)
crop_img = image[100:300, 200:1000]

cv2.imwrite('temp_file/resized1.jpg',crop_img)

img = Image.open("temp_file/resized1.jpg")
img.load()
i = pytesseract.image_to_string(img)
try:
	f2 = re.search('IFSC Code: (.*)', i).group(1)
except Exception:
	try:
		f2 = re.search('IFSC Code : (.*)', i).group(1)
	except Exception:
		f2 = "Mismatch"
		
#print f2



# Account No
image = cv2.imread(filepath)
crop_img = image[500:800, 0:900]
cv2.imwrite('temp_file/resized1.jpg',crop_img)

img = Image.open('temp_file/resized1.jpg')
img.load()
i = pytesseract.image_to_string(img)

try:
	f3=re.search('([0-9]{10,})',i).group(1)
except Exception:
	f3="Mismatch"
	#print f3

string= {"Bank Name": f1, "IFSC Code":f2, "Account No":f3, "Name": f4}
print string

with open('json_file/'+filename + '.json', 'w') as fp:
	json.dump(string, fp)


#i=unicode(i,'utf-8')

print ""
print "</body></html>"