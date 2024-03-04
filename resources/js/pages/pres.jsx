import SensorPage from "./sensor";

const PressurePage = (props) => {
    return <SensorPage 
        title='Датчик "Давления"' param="P"
        html_unit={'МПа'} 
        test_url={'http://127.0.0.1:8000/api/r/p'}
    />
}

export default PressurePage;