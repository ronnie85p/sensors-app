import { useContext, useState, useRef } from 'react';
import Header from './components/main/header.jsx';
import Container from './components/main/container.jsx';
import TempPage from './pages/temp.jsx';
import PressurePage from './pages/pres.jsx';
import SpeedPage from './pages/speed.jsx';

export default function App() {
    const [p, setPage] = useState(-1);

    const menu = {
        caption: 'Датчики',
        items: [
            {
                title: 'Температура'
            },
            {
                title: 'Давление'
            },
            {
                title: 'Обороты'
            }
        ]
    }

    return <>
        <Header />
        <Container>
            <div className='row'>
                <div className='col-2'>
                    <div>{menu.caption}</div>
                    <nav>
                        <ul>
                            {menu.items.map((item, key) => (
                                <li key={key} onClick={() => setPage(key)}>{item.title}</li>
                            ))}
                        </ul>
                    </nav>
                </div>
                <div className='col'>
                   {p == 0 ? <TempPage /> : <></>}
                   {p == 1 ? <PressurePage /> : <></>}
                   {p == 2 ? <SpeedPage /> : <></>}
                </div>
            </div>
        </Container>
    </>
}

