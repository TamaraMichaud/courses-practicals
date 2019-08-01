START C:\Users\tamara.michaud\apache-tomcat-8.5.43\bin\shutdown.bat
if NOT ["%errorlevel%"]==["0"] pause

robocopy "C:\Users\tamara.michaud\Desktop\courses-practicals\angularjs-trainings" "C:\Users\tamara.michaud\apache-tomcat-8.5.43\webapps\angularjs-trainings" /E
if NOT ["%errorlevel%"]==["0"] pause

C:\Users\tamara.michaud\apache-tomcat-8.5.43\bin\startup.bat
