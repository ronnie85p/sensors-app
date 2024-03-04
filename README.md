<p>Версия php >= 8.3.0</p>

Server Side api<br/>
GET api/sensors/{param}<br/>
GET|POST api/sensors/config/{param}<br/>
GET api/sensors/logs/{param}<br/>

Client Side api<br/>
Sensor.http.getConfig(param) - Получить конфигурацию датчика.<br/>

Sensor.http.updateConfig(param, data) - Обновить конфигурацию датчика.<br/>
data = { query_delay: '', url: '' }<br/>

Sensor.http.getLogs(param, params) - Получить логи датчика.<br/>
params = { start: 0, end: 25, date_start: null, date_end: null, sortby: 'created_at', sortdir: 'DESC'};<br/>

Sensor.http.getValue(param) - Получить значение датчика.<br/>


Для тестирования датчиков<br/>
http://127.0.0.1/api/t/{param}<br/>

param - один из датчиков:<br/>
T - датчик температуры;<br/>
P - датчик давления;<br/>
V - датчик оборотов.<br/>


