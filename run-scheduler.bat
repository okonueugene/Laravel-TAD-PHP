@echo off
cd /d C:\xampp\htdocs\attendance-app
C:\xampp\php\php.exe artisan schedule:run >> storage\logs\schedule.log 2>> storage\logs\schedule-error.log