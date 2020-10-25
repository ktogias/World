ELEMENTS=$(xmllint --xpath "string(/coverage/project/metrics/@elements)" $1)
COVEREDELEMENTS=$(xmllint --xpath "string(/coverage/project/metrics/@coveredelements)" $1)
RATIO=$(bc <<< 'scale=4; '$COVEREDELEMENTS/$ELEMENTS)
echo $RATIO
