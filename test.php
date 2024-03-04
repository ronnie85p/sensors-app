<?php

$out = null;
exec('curl http://127.0.0.1:8000/api/r/t', $out);

echo print_r($out, true);