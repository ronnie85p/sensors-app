Версия php >= 8.3.0

Server Side api
GET api/sensors/{param}
GET|POST api/sensors/config/{param}
GET api/sensors/logs/{param}

Client Side api
Sensor.http.getConfig(param) - Получить конфигурацию датчика.

Sensor.http.updateConfig(param, data) - Обновить конфигурацию датчика.
data = { query_delay: '', url: '' }

Sensor.http.getLogs(param, params) - Получить логи датчика.
params = { start: 0, end: 25, date_start: null, date_end: null, sortby: 'created_at', sortdir: 'DESC'};

Sensor.http.getValue(param) - Получить значение датчика.


Для тестирования датчиков
http://127.0.0.1/api/t/{param}

param - один из датчиков:
T - датчик температуры;
P - датчик давления;
V - датчик оборотов.


