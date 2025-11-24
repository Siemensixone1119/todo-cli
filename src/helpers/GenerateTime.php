<?php
function GenerateTime()
{
  return (new DateTime("now", new DateTimeZone("+03:00")))->format("Y-m-d H:i");
}