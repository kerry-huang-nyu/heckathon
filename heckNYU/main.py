
# I am sad
import boto3

# Document
documentName = "myCanvas.jpg"

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

for item in response["Blocks"]:
    if item["BlockType"] == "LINE":
        print ('\033[94m' +  item["Text"] + '\033[0m')

# f = open("demo.txt", "w")
# a = []
# depth = 0
# for item in response["Blocks"]:
#     if item["BlockType"] == "LINE":
#         if item["Text"] == "BEGIN CODE":
#             start = True
#         elif item["Text"] == "END CODE":
#             start = False
#         elif start:
#             components = item["Text"].split(" ")
#             line = "\t" * depth
#             for c in components:
#                 if c.lower() in "public static void main int char":
#                     c = c.lower()
#                 if len(line) > 0 and line[-1] not in ".([\t":
#                     line += " "
#                 line += c.replace("printin", "println").replace("print/n", "println")
#                 a.append(c)
#             if line[-1] == "{":
#                 depth += 1
#             elif line[-1] == "}":
#                 depth -= 1
#                 line = line[1:]
#             # print(line)
#             f.write(line + "\n")
# f.close()
# print(a)
