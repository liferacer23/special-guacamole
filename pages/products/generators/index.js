/* eslint-disable react-hooks/rules-of-hooks */
import antDCarousel from "antd/lib/carousel";
import Collapse from "antd/lib/collapse";
import Head from "next/head";
import Image from "next/image";
import Link from "next/link";
import React, { useRef } from "react";
import { AiOutlineHome } from "react-icons/ai";
import styled from "styled-components";
import generator from "../../../assets/generators/generator1.jpg";
import titleBar from "../../../assets/titlebar-bg.jpg";
import { Flex, Text } from "../../../components/Base/";
import { LeftOutlined } from "@ant-design/icons";
import { RightOutlined } from "@ant-design/icons";

const Carousel = styled(antDCarousel)`
  width: 50rem !important;
  height:40rem !important;
  @media (max-width: 1000px) {
    width: 24rem !important;
    height:24rem !important;
  }
  @media (max-width: 763px) {
    width: 20rem !important;
    height: 20rem !important;
  }
  > .slick-dots li button {
    width: 18px;
    height: 18px;
    border-radius: 100%;
  }
  > .slick-dots li.slick-active button {
    width: 14px;
    height: 14px;
    border-radius: 100%;
    background: #808080ff;
    border:1px solid #0002
  }
`;
const text = `
Generators don't actually create electricity. Instead, they convert mechanical or chemical energy into electrical energy. They do this by capturing the power of motion and turning it into electrical energy by forcing electrons from the external source through an electrical circuit.
`;
const { Panel: antDpanel } = Collapse;

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
  const carouselRef = useRef(null);
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
            fontWeight="bold"
            mobileTextAlign="center"
            mobileFontSize="2rem"
          >
            Generators
          </Text>
          <Flex width="100%" justifyContent="center" gap="0px">
            <Flex width="20%" directionMobile="row" widthMobile="40%" gap="5px">
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
              <Link href="/products">
                <Flex width="50%" directionMobile="row" widthMobile="40%">
                  <Text
                    fontSize="1rem"
                    color="#fff"
                    textAlign="center"
                    fontWeight="bold"
                    cursor="pointer"
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
                  cursor="pointer"
                >
                  Generators
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
            Generator Supplier
          </Text>

          <Text
            color="rgb(136,142,148)"
            fontSize="0.9rem"
            textAlign="left"
            width="90%"
          >
            Nileco Electric Equipment Manufacturing PLC packages Cummins diesel
            engines in their gensets from 25 to 2031 kVA Prime, as well as
            related components and technology. We are procuring Cummins Engines
            from India/China/USA.
            <br />
            <br />
            These are original engines with international warranty for 1 year
            under warranty in prime application and 2 years in standby
            application.
            <br />
            The Engine Business Unit designs and manufactures state-of-the-art
            diesel engines. The business also offers new parts and
            remanufactured parts and engines.
            <br />
            <br />
            The NILECO Unit provides high-horsepower engines and power
            generation across UAE , Africa and Middle East with standby and
            prime power generator sets, alternators, paralleling switchgear and
            other components. Power Systems offers integrated generator for use
            in commercial industrial, mining, marine, and defense applications
            to name a few.
          </Text>
          <Collapse accordion expandIconPosition="end">
            <Panel header={"Perkins Generators"} key="1">
              <p>{text}</p>
            </Panel>
          </Collapse>
          <Collapse>
            <Panel header={"Cummins Generators"} key="2">
              <p>{text}</p>
            </Panel>
          </Collapse>
          <Collapse>
            <Panel header={"Diesel Generators"} key="3">
              <p>{text}</p>
            </Panel>
          </Collapse>
          <Collapse>
            <Panel header={"Open Diesel Generators"} key="4">
              <Flex style={{position:'relative'}} justifyContent="center" alignItems="center" justifyContentMobile="center" alignItemsMobile="center" width="100%">
                {" "}
                <LeftOutlined
                  style={{ color: "#808080", fontSize: "2rem", cursor: "pointer",position:'absolute',left:'0',zIndex:'1' }}
                  onClick={() => {
                    carouselRef.current.prev();
                  }}
                />
                <Carousel
                  ref={carouselRef}
                  style={{ height: "800px", width: "100%" }}
                >
                  <Flex justifyContent="center">
                    <Image
                    style={{zIndex:"-1"}}
                      src={generator}
                      alt="sliderImage"
                      height="700px"
                      width="800px"
                    />
                  </Flex>
                  <Flex justifyContent="center">
                    <Image
                    style={{zIndex:"-1"}}
                      src={generator}
                      alt="sliderImage"
                      height="700px"
                      width="800px"
                    />
                  </Flex>
                  <Flex justifyContent="center">
                    <Image
                    style={{zIndex:"-1"}}
                      src={generator}
                      alt="sliderImage"
                      height="700px"
                      width="800px"
                    />
                  </Flex>
                  <Flex justifyContent="center">
                    <Image
                      src={generator}
                      alt="sliderImage"
                      height="700px"
                      width="800px"
                    />
                  </Flex>
                </Carousel>
                <RightOutlined
                  style={{ color: "#808080", fontSize: "2rem", cursor: "pointer",position:'absolute',right:'0',zIndex:'1' }}
                  onClick={() => {
                    carouselRef.current.next();
                  }}
                />
              </Flex>
            </Panel>
          </Collapse>
          <Collapse>
            <Panel header={"Canopy/Soundproof Generators"} key="5">
              <p>{text}</p>
            </Panel>
          </Collapse>
          <Collapse>
            <Panel header={"Super Silent Generators"} key="6">
              <p>{text}</p>
            </Panel>
          </Collapse>
          <Collapse>
            <Panel header={"Mobile/ Portable Type Generators"} key="7">
              <p>{text}</p>
            </Panel>
          </Collapse>
          <Collapse>
            <Panel header={"Light Towel Generators"} key="8">
              <p>{text}</p>
            </Panel>
          </Collapse>
        </Flex>
      </Flex>
    </>
  );
}

// react slider component
