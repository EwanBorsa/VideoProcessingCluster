@echo off
git add *
set /p input= Commit:
echo input
git commit -m input
git push 