inputfile=$1
outputfile=$2

ffmpeg -i inputfile -vf "select='eq(pict_type\,B)',showinfo" outputfile
ffmpeg -i inputfile -vf "select='eq(pict_type\,P)',showinfo" outputfile
ffmpeg -i inputfile -vf "select='eq(pict_type\,I)',showinfo" outputfile