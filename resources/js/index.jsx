import { createRoot } from 'react-dom/client';
import App from './app.jsx';
import './bootstrap.js';
import '../css/app.css';
import Context from './contexts/themeMain.jsx';

const elem = document.getElementById('app');
const root = createRoot(elem);
root.render(
    <Context.Provider value={{config: JSON.parse(elem.dataset.config)}}>
        <App />
    </Context.Provider>
);