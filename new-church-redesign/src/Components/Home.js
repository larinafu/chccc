import React from "react";
import MDEditor from "@uiw/react-md-editor";
import { useState } from "react";

const Home = (props) => {
  const [homeBody, setHomeBody] = useState(
    props.isEnglish ? "**Hello world!!!**" : "**你好世界！**"
  );
  console.log(homeBody);
  return (
    <div>
      <h1>Announcements</h1>
      {props.isMod ? (
        <MDEditor
          value={homeBody}
          onChange={setHomeBody}
          preview={props.isMobile ? "edit" : "live"}
        />
      ) : (
        <MDEditor.Markdown source={homeBody} />
      )}
    </div>
  );
};

export default Home;
