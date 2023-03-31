inputfile=$1
outputfile=$2

ffmpeg -i inputfile -vf "select='eq(pict_type,B)'" -vsync vfr outputfile/Bframe-%.jpg