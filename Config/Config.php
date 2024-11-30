<?php

/* --REMOTO  */
const BASE_URL = "http://localhost/peluqueria-canina";
const DB_HOST = "bhgtoc1qausfbocum0f0-mysql.services.clever-cloud.com";
const DB_NAME = "bhgtoc1qausfbocum0f0";
const DB_USER = "ujjnxedlzantdocl";
const DB_PASSWORD = "E0fSQ7TKOq7PAsYPuTPk";
const DB_PORT = 3306; 

/* --DEPLOY  */
/* const BASE_URL = "http://senatest.free.nf/peluqueria-canina";
const DB_HOST = "https://sql208.infinityfree.com/";
const DB_NAME = "if0_37732983_peluqueria_canina";
const DB_USER = "if0_37732983";
const DB_PASSWORD = "4F0K4FfcW15";
const DB_PORT = 3306; */

/* --LOCAL   
const BASE_URL = "http://localhost/peluqueria-canina";
const DB_HOST = "localhost";
const DB_NAME = "caninofeliz";
const DB_USER = "root";
const DB_PASSWORD = ""; 
const DB_PORT = 3306;*/
const DB_CHARSET = "utf8";


//Zona horaria
date_default_timezone_set('America/Bogota');

//Datos de conexión a Base de Datos

//Delimitadores decimal y millar Ej. 24,1989.00
const SPD = ",";
const SPM = ".";

//Simbolo de moneda
const SMONEY = "$";