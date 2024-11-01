<?php

const BASE_URL = "http://localhost/peluqueria-canina";


$modo = "LOCAL"; //LOCAL || REMOTO

/* --REMOTO */
/* const DB_HOST = "bhgtoc1qausfbocum0f0-mysql.services.clever-cloud.com";
const DB_NAME = "bhgtoc1qausfbocum0f0";
const DB_USER = "ujjnxedlzantdocl";
const DB_PASSWORD = "E0fSQ7TKOq7PAsYPuTPk"; */

/* --LOCAL */
const DB_HOST = "localhost";
const DB_NAME = "caninofeliz";
const DB_USER = "root";
const DB_PASSWORD = ""; 


const DB_CHARSET = "utf8";
//Zona horaria
date_default_timezone_set('America/Bogota');

//Datos de conexión a Base de Datos


//Delimitadores decimal y millar Ej. 24,1989.00
const SPD = ",";
const SPM = ".";

//Simbolo de moneda
const SMONEY = "$";