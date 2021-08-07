import "./App.css";

// Components
import Navbar from "./Components/Navbar/Navbar";
import Home from "./Components/Home";
import About from "./Components/About";
import Sermons from "./Components/Sermons";
import Worship from "./Components/Worship";
import AuthButton from "./Components/AuthButton/AuthButton";

import { useState, useEffect } from "react";
import { useMediaQuery } from "react-responsive";
import { Route } from "react-router-dom";

function App() {
  const [isEnglish, setIsEnglish] = useState(true);
  const isMobile = useMediaQuery({ query: "(max-width: 40em)" });
  const [isMod, setIsMod] = useState(() => {
    const localData = localStorage.getItem("isMod");
    return localData ? JSON.parse(localData) : false;
  });

  console.log(isMod);

  useEffect(() => {
    localStorage.setItem("isMod", JSON.stringify(isMod));
  }, [isMod]);

  return (
    <div>
      <Navbar
        isEnglish={isEnglish}
        setIsEnglish={setIsEnglish}
        isMobile={isMobile}
      />
      <p>hello world</p>
      <p>My name is larina!</p>
      <Route exact path="/" component={Home} />
      <Route exact path="/about" component={About} />
      <Route exact path="/sermons" component={Sermons} />
      <Route exact path="/worship" component={Worship} />
      <AuthButton setIsMod={setIsMod} />
    </div>
  );
}

export default App;
