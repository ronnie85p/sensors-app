const Styles = {
    Main: {
        width: 1000,
        margin: 'auto'
    }
}

export default ({ children }) => {
    return <div style={Styles.Main}>
        {children}
    </div>
}