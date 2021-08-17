import React from "react";
import { useState } from "react";

import "./Sermons.css";

const Sermons = (props) => {
  const [sermonForm, showSermonForm] = useState(false);
  return (
    <div>
      <button onClick={() => showSermonForm(true)}>Add a sermon</button>
      {sermonForm && (
        <div className="formContainer">
          <form>
            <button
              className="exitBtn"
              type="reset"
              onClick={() => {
                showSermonForm(false);
              }}
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                fill="currentColor"
                class="bi bi-x-lg"
                viewBox="0 0 16 16"
              >
                <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
              </svg>
            </button>
            <h1>Add a Sermon</h1>
            <div>
              <label for="sermonDate">Date given: </label>
              <input type="date" name="sermonDate" id="sermonDate" />
            </div>
            <div>
                <label for="sermonTitle">Title: </label>
                <input type="text" name="sermonTitle" id="sermonTitle"/>
            </div>
            <div>
                <label for="sermonPastor">Pastor: </label>
                <input type="text" name="sermonPastor" id="sermonPastor"/>
            </div>
            <div>
                <label for="sermonRecording">Video/Voice Recording: </label>
                <input type="file" name="sermonRecording" id="sermonRecording"/>
            </div>
          </form>
        </div>
      )}
    </div>
  );
};

export default Sermons;
