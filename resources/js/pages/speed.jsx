import SensorPage from "./sensor";

const SpeedPage = (props) => {
    return <SensorPage 
        title='Датчик "Оборотов"' 
        param="V"
        html_unit={'об / мин.'} 
        test_url={'http://127.0.0.1:8000/api/r/s'}
    />;
}

export default SpeedPage;