ffmpeg -i $1 -vf "select='eq(pict_type,P)'" -vsync vfr $2/Pframe-%.jpeg