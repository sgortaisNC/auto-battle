import axios from 'axios';
import {useEffect, useState} from "react";

const Home = (props) => {

    const [data, setData] = useState([]);


    useEffect(() => {
        axios.get('http://battle.local/test.php',{ crossdomain: true }).then((res) => {
            setData(res.data.test)
        });
    },[]);




    return (
        <div>
            <h1>{data}</h1>
        </div>
    )
}

export default Home;
