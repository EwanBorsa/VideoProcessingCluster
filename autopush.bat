@echo off
set http_proxy=http://localhost:5865
set https_proxy=http://localhost:5865
git add *
git commit -m "autopush"
git push 
@pause