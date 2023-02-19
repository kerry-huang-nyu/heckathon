#!/usr/bin/env python

# Me big sad
import boto3
import sys

# Document
documentName = sys.argv[1]
# documentName = "image.png"

# Read document content
with open(documentName, 'rb') as document:
    imageBytes = bytearray(document.read())

# Amazon Textract client
textract = boto3.client('textract', region_name='us-east-1')
#
# Call Amazon Textract
response = textract.detect_document_text(Document={'Bytes': imageBytes})
#
# Print detected text
start = False

output = ""
a = []
depth = 0
for item in response["Blocks"]:
    if item["BlockType"] == "LINE":
        if item["Text"] == "BEGIN CODE":
            start = True
        elif item["Text"] == "END CODE":
            start = False
        elif start:
            components = item["Text"].split(" ")
            tab = "&nbsp;&nbsp;&nbsp;&nbsp;"
            line = tab * depth
            for c in components:
                if c.lower() in "public static void main int char":
                    c = c.lower()
                if len(line) > 0 and line[-1] not in ".([":
                    line += " "
                if c[0].upper() == 'O' and len(line) > 0 and line[-1] not in ".([":
                    c = '0' + c[1:]
                line += c.replace("printin", "println").replace("print/n", "println")
                a.append(c)
            if line[-1] == "{":
                depth += 1
            elif line[-1] == "}":
                depth -= 1
                line = line[len(tab):]
            output += line + "<br>"
print(output)
if not a:
    for item in response["Blocks"]:
        if item["BlockType"] == "LINE":
            print ('\033[94m' +  item["Text"] + '\033[0m')