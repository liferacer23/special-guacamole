import React from "react";
import NavBar from "../navbar";
import Footer from "../Footer/";
export default function Layout({ children }) {
  return (
    <>
      {/* <NavBar /> */}
      {children}
      <Footer />
    </>
  );
}
