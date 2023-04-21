@echo off
git add *
echo "Metti il commento tra apici, miraccomando!"
set /p "c=Commento: "
git commit -m %c%
git push 
@pause