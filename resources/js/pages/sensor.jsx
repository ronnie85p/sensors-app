import { useContext, useState, useRef } from 'react';
import TabCard from '../components/TabCard.jsx';
import Sensor from '../api/sensor.js';

const DataTabContent = ({ param, html_unit }) => {
    const updateOnSubmit = (event) => {
        event.preventDefault();

        Sensor.http.getValue(param);
    };

    Sensor.http.getValue(param);

    return <>
        <div className='row mb-4' style={{ height: 100 }}>
            <div className='col-12 text-center m-auto text-muted' style={{ fontSize: '2em'}}>
                <span id="sensor-value">-</span> <span className='' dangerouslySetInnerHTML={{ __html: html_unit }}></span>
            </div>
        </div>

        <hr />

        <form onSubmit={updateOnSubmit}>
            <button className='btn btn-primary'>Обновить данные</button>
        </form>
    </>;
};

const StoryTabContent = ({ param }) => {

    const params = {
        start: 0, end: 5
    };

    const updateOnSubmit = (event) => {
        event.preventDefault();

        Sensor.http.getLogs(param, params);
    }

    Sensor.http.getLogs(param, params);

    return <>
        <form className='text-right' onSubmit={updateOnSubmit}>
            <button className='btn btn-secondary'>Обновить</button>
        </form><hr className='mb-4'/>
        <div id="sensor-logs"></div>
    </>
};

const SettingsTabContent = ({ param, test_url }) => {
    const submitter = useRef(0);

    const onChange = (event) => {
        submitter.current.classList.remove('disabled');
    }

    const onSubmit = (event) => {
        event.preventDefault();

        Sensor.http.updateConfig(param, event.target);
    }

    Sensor.http.getConfig(param);

    return <>
        <form onSubmit={onSubmit} onInput={onChange}>
            <div className='row mb-2'>
                <div className='col-3'>
                    <label htmlFor=''>Интервал обновления</label>      
                </div>
                <div className='col-2'>
                    <input className='form-control' type="text" name="query_delay" id="config_query_delay"/>
                </div>
            </div>

            <div className='row mb-2'>
                <div className='col-3'>
                    <label htmlFor=''>URL</label>      
                </div>
                <div className='col'>
                    <input className='form-control mb-1' type="text" name="url" id="config_url" />
                    <div className='text-muted'>
                        Например (тестовый): {test_url}
                    </div>
                </div>
            </div><hr />

            <button className='btn btn-primary disabled' type="submit" ref={submitter}>Сохранить</button>
        </form>
    </>
};

const tabList = [
    {
        title: 'Данные',
        Component: DataTabContent 
    },

    {
        title: 'История',
        Component: StoryTabContent
    },

    {
        title: 'Настройки',
        Component: SettingsTabContent
    },
];

const SensorPage = ({ title, param, html_unit, test_url }) => {
    const [tabActive, setTabActive] = useState(0);

    const handleTabClick = (key) => {
        setTabActive(key);
    }

    return <>
        <h3 className='mb-4'>{title}</h3>

        <TabCard>
            <TabCard.Header>
                <TabCard.List>
                    {tabList.map((item, key) => (
                        <TabCard.ListItem {...item.props} isActive={key == tabActive} key={key} onClick={() => handleTabClick(key)}>{item.title}</TabCard.ListItem>
                    ))}
                </TabCard.List>
            </TabCard.Header>

            <TabCard.Body>
                {tabList.map((item, key) => (
                    <TabCard.Pane {...item.props} isActive={key == tabActive} key={key}>
                        <item.Component param={param} {...{html_unit, test_url}} />
                    </TabCard.Pane>
                ))}
            </TabCard.Body>
        </TabCard>
    </>
}

export default SensorPage;