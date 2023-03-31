inputfile=$1
outputfile=$2

ffmpeg -flags2 +export_mvs -i inputfile -vf codecview=mv=pf+bf+bb outputfile