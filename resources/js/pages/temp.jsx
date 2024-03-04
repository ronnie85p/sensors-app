import SensorPage from "./sensor";

const TempPage = (props) => {
    return <SensorPage 
        title='Датчик "Температуры"' 
        param="T" 
        html_unit='&#x2103'
        test_url={'http://127.0.0.1:8000/api/r/t'}
    />
}

export default TempPage;