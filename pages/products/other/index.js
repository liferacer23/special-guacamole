import React from "react";
import Head from "next/head";
import styled from "styled-components";
import titleBar from "../../../assets/titlebar-bg.jpg";
import { Flex, Text, Button } from "../../../components/Base/";
import { AiOutlineHome } from "react-icons/ai";
import antDCollapse from "antd/lib/collapse";
import Link from "next/link";

const text = `
Generators don't actually create electricity. Instead, they convert mechanical or chemical energy into electrical energy. They do this by capturing the power of motion and turning it into electrical energy by forcing electrons from the external source through an electrical circuit.
`;
const { Panel: antDpanel } = antDCollapse;
const Collapse = styled(antDCollapse)`

&.ant-collapse {
  background: #fff !important;
  
}
`;
const Panel = styled(antDpanel)`
  width: 70rem;
  margin-top: 0.5rem;
  @media (max-width: 1000px) {
    width: 24rem;
  }
  @media (max-width: 763px) {
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
export default function index() {
  return (
    <>
      <Head>
        <title>Generators</title>
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
            mobileTextAlign="center"
            fontWeight="bold"
            mobileFontSize="2rem"
          >
            Other Products
          </Text>
          <Flex width="100%" justifyContent="center" gap="0px">
            <Flex width="20%" directionMobile="row" widthMobile="40%" gap="5px">
              <Link href="/">
              <Flex width="50%" directionMobile="row" widthMobile="50%" justifyContent="center" gap="0px">
                  {" "}
                  <AiOutlineHome style={{ fontSize: "1.5rem" }} />
                  <Text
                    color="#fff"
                    fontSize="1rem"
                    textAlign="center"
                    fontWeight="bold"
                    cursor="pointer"
                    width="50%"
                    mobileWidth="60%"
                  >
                    Home
                  </Text>
                </Flex>
              </Link>
              /
              <Link href="/products">
                <Flex width="30%" directionMobile="row" widthMobile="40%">
                  <Text
                    fontSize="1rem"
                    color="#fff"
                    textAlign="center"
                    mobileTextAlign="left"
                    mobileFontSize="0.8rem"
                    fontWeight="bold"
                    cursor="pointer"
                    mobileWidth="25%"
                  >
                    Products
                  </Text>{" "}
                </Flex>
              </Link>
              /
              <Flex width="50%" directionMobile="row" widthMobile="40%">
                <Text
                  fontSize="1rem"
                  color="rgb(255, 199, 44)"
                  textAlign="center"
                  fontWeight="bold"
                  mobileFontSize="0.8rem"
                  cursor="pointer"
                  mobileWidth="25%"
                >
                  Other Products
                </Text>{" "}
              </Flex>
            </Flex>
          </Flex>
        </Flex>
      </StyledDiv>
      <Flex alignItems="center" background="#fff">
        <Flex
          direction="column"
          alignItems="center"
          justifyContent="center"
          margin="2rem"
        >
          <Text
            color="rgba(0, 48, 100, 1)"
            fontSize="2.1rem"
            mobileFontSize="2rem"
            fontWeight="bold"
            textAlign="left"
            width="90%"
          >
            Other Products
          </Text>

          <Collapse accordion expandIconPosition="end">
            <Panel header={"Genuine Spare Parts"} key="1">
              <p>{text}</p>
            </Panel>
          </Collapse>
          <Collapse>
            <Panel header={"Digital Controllers"} key="2">
              <p>{text}</p>
            </Panel>
          </Collapse>
          <Collapse>
            <Panel header={"Electrical Parts"} key="3">
              <p>{text}</p>
            </Panel>
          </Collapse>
        </Flex>
      </Flex>
    </>
  );
}
