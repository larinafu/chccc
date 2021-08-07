import React from "react";
import { Link } from "react-router-dom";

import "./Navbar.css";

const Navbar = (props) => {
  const handleToggle = () => {
    props.setIsEnglish(!props.isEnglish);
  };
  return props.isEnglish ? (
    <nav>
      <ul>
        <li>
          <Link to="/">Home</Link>
        </li>
        <li>
          <Link to="/about">About</Link>
        </li>
        <li>
          <Link to="/worship">Worship</Link>
        </li>
        <li>
          <Link to="/sermons">Sermons</Link>
        </li>
      </ul>
      <div>
        <button className="donateBtn">Donate</button>
        <button
          className={`toggleBtn ${
            props.isEnglish ? "toggleEnglish" : "toggleChinese"
          }`}
          onClick={handleToggle}
        >
          <div>{props.isEnglish ? "EN" : "中文"}</div>
          <div className="toggleCircle"></div>
        </button>
      </div>
    </nav>
  ) : (
    <nav>
      <ul>
        <li>
          <Link to="/">主頁</Link>
        </li>
        <li>
          <Link to="/about">簡介</Link>
        </li>
        <li>
          <Link to="/worship">崇拜</Link>
        </li>
        <li>
          <Link to="/sermons">講道</Link>
        </li>
      </ul>
      <div>
        <button className="donateBtn">奉献</button>
        <button
          className={`toggleBtn ${
            props.isEnglish ? "toggleEnglish" : "toggleChinese"
          }`}
          onClick={handleToggle}
        >
          <div>{props.isEnglish ? "EN" : "中文"}</div>
          <div className="toggleCircle"></div>
        </button>
      </div>
    </nav>
  );
};

export default Navbar;
