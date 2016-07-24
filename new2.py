#!/Python27/python
import Image
import pytesseract
import cgitb
import cgi
import sys
import os
import xlsxwriter
cgitb.enable(display=0, logdir="/path/to/logdir")

"Content-type: text/html"
print
print "<html><head>"
print ""
print "</head><body>"
#Reading text from Image 
temp=sys.argv[1]
filepath=os.path.join("upload/",temp)
img = Image.open(filepath)
img.load()
i = pytesseract.image_to_string(img)
i=unicode(i,'utf-8')
#i contain 
workbook = xlsxwriter.Workbook('Data.xlsx')
worksheet = workbook.add_worksheet()

# Widen the first column to make the text clearer.
worksheet.set_column('A:A', 20)

# Add a bold format to use to highlight cells.
bold = workbook.add_format({'bold': True})

# Write some simple text.
worksheet.write('A1', 'Text', bold)

worksheet.write('A2', i)
workbook.close()
print "</body></html>"