const TabCard = ({ children }) => {
    return <div className="card card-primary card-outline card-outline-tabs">{children}</div>
}

TabCard.Header = ({ children }) => {
    return <div className="card-header p-0 border-bottom-0">{children}</div>
};

TabCard.Body = ({ children }) => {
    return <div className="card-body">
        <div className="tab-content">{children}</div>
    </div>
};

TabCard.Pane = ({ children, isActive}) => {
    const activeClass = isActive === true ? " show active" : "";

    return <>
        <div className={`tab-pane fade${activeClass}`} role="tabpanel" {...{  }}>
            {children}
        </div>
    </>
}

TabCard.List = ({ children }) => {
    return <>
        <ul className="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            {children}
        </ul>
    </>
};

TabCard.ListItem = ({ children, isActive, onClick }) => {
    const activeClass = isActive === true ? " active" : "";

    return <>
        <li className="nav-item">
            <a className={`nav-link${activeClass}`} data-toggle="pill" role="tab" {...{ onClick }}>
                {children}
            </a>
        </li>
    </>
}

export default TabCard;