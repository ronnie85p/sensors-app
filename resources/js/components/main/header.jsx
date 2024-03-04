import Container from "./container"

const Styles = {
    Main: {
        backgroundColor: '#6711de',
        padding: 10, 
        color: '#fff',
        marginBottom: 30
    },
    Logo: {
        fontSize: '1.2em',
    }
}

export default ({ children }) => <>
    <header style={Styles.Main}>
        <Container>
            <div style={Styles.Logo}>Sensors monitoring</div>
            {children}
        </Container>
    </header>
</>