import React from "react";
import styled from "styled-components";
import titleBar from "../assets/titlebar-bg.jpg";
import { Flex, Text, Button } from "../components/Base";
import { AiOutlineHome } from "react-icons/ai";
import Head from "next/head";
import Collapse from "antd/lib/collapse";

import Link from "next/link";

import Select from "antd/lib/select";


const { Option } = Select;
const text = `
Generators don't actually create electricity. Instead, they convert mechanical or chemical energy into electrical energy. They do this by capturing the power of motion and turning it into electrical energy by forcing electrons from the external source through an electrical circuit.
`;
const { Panel: antDpanel } = Collapse;

const Panel = styled(antDpanel)`
  width: 65rem;

  @media (max-width: 768px) {
    width: 20rem;
  }
  &.ant-collapse-item-active {
    background: rgb(255, 199, 44);
    font-size: 1rem;
    color: #fff !important;
    .ant-collapse-header {
      fontsize: 25px;
      color: #fff !important;
      font-weight: bold;
    }
  }
  &.ant-collapse-item {
    font-size: 1rem;
    .ant-collapse-header {
      font-size: 1rem;
      color: rgba(0, 48, 100, 1);
      font-weight: bold;
    }
  }
`;
const StyledDiv = styled.div`
  background-image: url(${titleBar.src});
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 16rem;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  color: #fff;
  text-align: center;
`;
const FooterHeader = styled.div`
  height: 30rem;
  @media (max-width: 1000px) {
    display: none;
  }
`;
export default function services() {
  const children = [];
  for (let i = 10; i < 36; i++) {
    children.push(
      <Option key={i.toString(36) + i}>{i.toString(36) + i}</Option>
    )
  }
  return (
    <>
       <Head>
        <title>Service</title>
        <meta name="description" content="Generated by create next app" />
        <link rel="icon" href="/favicon.ico" />
      </Head>
      <StyledDiv>
        <Flex direction="column">
          <Text
            width="100%"
            mobileWidth="100%"
            fontSize="2rem"
            color="#fff"
            textAlign="center"
            fontWeight="bold"
            mobileTextAlign="center"
            mobileFontSize="2rem"
          >
            Services
          </Text>
          <Flex width="100%" justifyContent="center" gap="0px" >
            <Flex width="20%" directionMobile="row" widthMobile="40%" gap="0px" >
              <Link href="/">
                <Flex width="50%" directionMobile="row" widthMobile="40%">
                  {" "}
                  <AiOutlineHome style={{ fontSize: "1.5rem" }} />
                  <Text
                    color="#fff"
                    fontSize="1rem"
                    textAlign="center"
                    fontWeight="bold"
                    cursor="pointer"
                  >
                    Home
                  </Text>
                </Flex>
              </Link>
              /
              <Flex width="50%" directionMobile="row" widthMobile="40%" >
                <Text
                  fontSize="1rem"
                  color="rgb(255, 199, 44)"
                  textAlign="center"
                  fontWeight="bold"
                  cursor="pointer"
                >
                  Services
                </Text>{" "}
              </Flex>
            </Flex>
          </Flex>
        </Flex>
      </StyledDiv>
      <Flex alignItems="center" background="#fff">
        <Flex direction="column" alignItems="center" justifyContent="center" margin="2rem">
          <Text
            color="rgba(0, 48, 100, 1)"
            fontSize="2.3rem"
            mobileFontSize="2rem"
            fontWeight="bold"
            textAlign="left"
            width="55%"
          >
            Services
          </Text>
        
          <Collapse accordion expandIconPosition="end">
            <Panel header={"After Sales"} key="1">
              <p>{text}</p>
            </Panel>
            </Collapse>
            <Collapse>
            <Panel header={"Warranty support"} key="2">
              <p>{text}</p>
            </Panel>
          </Collapse>
        
        </Flex>
      </Flex>
      <FooterHeader></FooterHeader>
    </>
  );
}
