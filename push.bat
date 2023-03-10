@echo off
set http_proxy=http://localhost:5865
set https_proxy=http://localhost:5865
git add *
set /p "c=Commento: "
git commit -m %c%
git push 
@pause