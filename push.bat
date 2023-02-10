@echo off
git add *
set /p "c=Commento: "
git commit -m %c%
git push 
@pause