inputfile=$1
outputfile=$2

ffmpeg -i inputfile -vf "select='eq(pict_type,I)'" -vsync vfr outputfile/Iframe-%.jpeg