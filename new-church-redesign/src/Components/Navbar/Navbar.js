import React from "react";
import { Link } from "react-router-dom";
import { useState } from "react";

import "./Navbar.css";

const Navbar = (props) => {
  const [isDropdown, setIsDropdown] = useState(false);
  const handleToggle = () => {
    props.setIsEnglish(!props.isEnglish);
  };

  const handleHamburger = () => {
    setIsDropdown(!isDropdown);
  };
  return props.isEnglish ? (
    <nav>
      {props.isMobile ? (
        <>
          <button onClick={handleHamburger} className="hamburgerBtn">
            <div className={`hamburgerLine ${isDropdown && "exit"}`}></div>
            <div className={`hamburgerLine ${isDropdown && "exit"}`}></div>
            <div className={`hamburgerLine ${isDropdown && "exit"}`}></div>
          </button>

          <ul className={`mobileNavLinks ${isDropdown ? "" : "hiddenLinks"}`}>
            <li>
              <Link
                to="/"
                onClick={() => {
                  setIsDropdown(false);
                }}
              >
                Home
              </Link>
            </li>
            <li>
              <Link
                to="/about"
                onClick={() => {
                  setIsDropdown(false);
                }}
              >
                About
              </Link>
            </li>
            <li>
              <Link
                to="/worship"
                onClick={() => {
                  setIsDropdown(false);
                }}
              >
                Worship
              </Link>
            </li>
            <li>
              <Link
                to="/sermons"
                onClick={() => {
                  setIsDropdown(false);
                }}
              >
                Sermons
              </Link>
            </li>
          </ul>

          <div>
            <button className="donateBtn">Donate</button>
            <button
              className="toggleBtn toggleEnglish"
              onClick={handleToggle}
            >
              <div>{props.isEnglish ? "EN" : "中文"}</div>
              <div className="toggleCircle"></div>
            </button>
          </div>
        </>
      ) : (
        <>
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
              className="toggleBtn toggleEnglish"
              onClick={handleToggle}
            >
              <div>{props.isEnglish ? "EN" : "中文"}</div>
              <div className="toggleCircle"></div>
            </button>
          </div>
        </>
      )}
    </nav>
  ) : (
    <nav>
      {props.isMobile ? (
        <>
          <button onClick={handleHamburger} className="hamburgerBtn">
            <div className={`hamburgerLine ${isDropdown && "exit"}`}></div>
            <div className={`hamburgerLine ${isDropdown && "exit"}`}></div>
            <div className={`hamburgerLine ${isDropdown && "exit"}`}></div>
          </button>

          <ul className={`mobileNavLinks ${isDropdown ? "" : "hiddenLinks"}`}>
            <li>
              <Link
                to="/"
                onClick={() => {
                  setIsDropdown(false);
                }}
              >
                主頁
              </Link>
            </li>
            <li>
              <Link
                to="/about"
                onClick={() => {
                  setIsDropdown(false);
                }}
              >
                簡介
              </Link>
            </li>
            <li>
              <Link
                to="/worship"
                onClick={() => {
                  setIsDropdown(false);
                }}
              >
                崇拜
              </Link>
            </li>
            <li>
              <Link
                to="/sermons"
                onClick={() => {
                  setIsDropdown(false);
                }}
              >
                講道
              </Link>
            </li>
          </ul>

          <div>
            <button className="donateBtn">奉献</button>
            <button
              className="toggleBtn toggleChinese"
              onClick={handleToggle}
            >
              <div>{props.isEnglish ? "EN" : "中文"}</div>
              <div className="toggleCircle"></div>
            </button>
          </div>
        </>
      ) : (
        <>
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
              className="toggleBtn toggleChinese"
              onClick={handleToggle}
            >
              <div>{props.isEnglish ? "EN" : "中文"}</div>
              <div className="toggleCircle"></div>
            </button>
          </div>
        </>
      )}
    </nav>
  );
};

export default Navbar;
