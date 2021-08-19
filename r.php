<?php
echo dirname($_SERVER['SCRIPT_FILENAME'])." <br>";
echo realpath("view")."<br>";
echo $_SERVER['SCRIPT_FILENAME']."<br>";

echo urldecode("view");