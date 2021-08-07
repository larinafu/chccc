import logo from "./logo.svg";
import "./App.css";

// Components
import Navbar from "./Components/Navbar/Navbar";
import Home from "./Components/Home";
import About from "./Components/About";
import Sermons from "./Components/Sermons";
import Worship from "./Components/Worship";

import { Route } from "react-router-dom";


function App() {
  return (
    <div>
      <Navbar />
      <p>hello world</p>
      <p>My name is larina!</p>
      <Route exact path="/" component={Home} />
      <Route exact path="/about" component={About} />
      <Route exact path="/sermons" component={Sermons} />
      <Route exact path="/worship" component={Worship} />

    </div>
  );
}

export default App;
