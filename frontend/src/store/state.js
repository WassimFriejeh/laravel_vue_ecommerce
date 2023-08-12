const state = {
    user: {
        token: sessionStorage.getItem('Token'),
        data: {}
    }
    ,
    products: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    }
}

export default state;
