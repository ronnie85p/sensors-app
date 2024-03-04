import axios from 'axios';

const Sensor = {
    http: {
        async getValue(param) {
            const response = await axios.get(
                `/api/sensors/${param}`,
            );
    
            if (response.data && response.data.data) {
                Sensor.dom.setValue(response.data.data);
            }
        },

        async getLogs(param, params) {
            const response = await axios.get(
                `/api/sensors/logs/${param}`,
                { params }
            );
    
            if (response.data) {
                Sensor.dom.setLogs(response.data.data);
            }
        },

        async getConfig(param) {
            const response = await axios.get(
                `/api/sensors/config/${param}`
            );
    
            if (response.data && response.data.data) {
                Sensor.dom.setConfig(response.data.data);
            }
        }, 

        async updateConfig(param, data) {
            const response = await axios.post(
                `/api/sensors/config/${param}`, 
                data,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            );
        }
    },

    dom: {
        setValue(value) {
            document.getElementById('sensor-value').innerText = value;
        },

        setLogs(logs) {
            let out = '';
    
            out += `<div class="row mb-2" style="font-weight: bolder">
                <div class="col-8">Дата и время</div>
                <div class="col-4">Значение</div>
            </div><hr />`;

            if (logs && logs.length) {
                logs.map(item => {
                    out += `<div class="row">
                        <div class="col-8">${item.created_at}</div>
                        <div class="col-4">${item.value}</div>
                    </div><hr />`;
                });
            } else {
                out += `<h5 class="text-center">Нет данных</h5>`;
            }

            document.getElementById('sensor-logs').innerHTML = out;
        },

        setConfig(data) {
            document.getElementById('config_query_delay').value =  data.query_delay;
            document.getElementById('config_url').value = data.url;
        }
    },
};

export default Sensor;