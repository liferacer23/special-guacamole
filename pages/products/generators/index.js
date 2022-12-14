/* eslint-disable react-hooks/rules-of-hooks */
import "antd/dist/antd.css";
import antDCarousel from "antd/lib/carousel";
import antDCollapse from "antd/lib/collapse";
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
import generator11 from "../../../assets/generators/generator11.jpg";
import generator12 from "../../../assets/generators/generator12.jpg";
import generator13 from "../../../assets/generators/generator13.jpg";
import generator10 from "../../../assets/generators/generator10.jpg";
import generator9 from "../../../assets/generators/rental.jpg";
import generator8 from "../../../assets/generators/generator8.jpg";
import generator7 from "../../../assets/generators/generator7.jpg";
import generator6 from "../../../assets/generators/generator6.jpg";
import generator4 from "../../../assets/generators/generator4.jpg";
import generator5 from "../../../assets/generators/generator5.jpg";
import generator36 from "../../../assets/generators/generator36.jpg";
const Carousel = styled(antDCarousel)`
  width: 50rem !important;
  height: 40rem !important;
  @media (max-width: 1000px) {
    width: 24rem !important;
    height: 24rem !important;
  }
  @media (max-width: 763px) {
    width: 20rem !important;
    height: 20rem !important;
  }
  > .slick-dots li button {
    width: 14px;
    height: 14px;
    background: #808080ff;
    border-radius: 100%;
    border: 1px solid #fff;
  }
  > .slick-dots li.slick-active button {
    width: 14px;
    height: 14px;
    border-radius: 100%;
    background: #808080ff;
    border: 1px solid ##808080ff;
  }
`;
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
  const carouselRef = useRef(null);
  return (
    <>
      <Head>
        <title>Generators</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
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
          <Flex
            width="100%"
            justifyContent="center"
            gap="0px"
            widthMobile="80%"
          >
            <Flex width="25%" directionMobile="row" widthMobile="80%" gap="5px">
              <Link href="/">
                <Flex
                  width="50%"
                  directionMobile="row"
                  widthMobile="80%"
                  justifyContent="center"
                  gap="0px"
                >
                  {" "}
                  <AiOutlineHome style={{ fontSize: "1.5rem" }} />
                  <Text
                    color="#fff"
                    fontSize="1rem"
                    mobileFontSize="0.8rem"
                    textAlign="center"
                    fontWeight="bold"
                    cursor="pointer"
                    width="50%"
                    mobileWidth="50%"
                  >
                    Home{" "}
                  </Text>
                </Flex>
              </Link>
              /
              <Link href="/products">
                <Flex width="50%" directionMobile="row" widthMobile="60%">
                  <Text
                    fontSize="1rem"
                    mobileFontSize="0.8rem"
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
              <Flex width="50%" directionMobile="row" widthMobile="70%">
                <Text
                  fontSize="1rem"
                  mobileFontSize="0.8rem"
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
            style={{ marginLeft: "1rem" }}
          >
            Generator Supplier
          </Text>

          <Text
            style={{ padding: "1rem" }}
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
              <Text
                style={{ padding: "1rem" }}
                color="rgb(136,142,148)"
                fontSize="0.9rem"
                mobileFontSize="0.8rem"
                textAlign="left"
                width="90%"
              >
                JET Generators are powered by Perkins engines and coupled with
                Leroy-Somer alternators, along with Deep Sea controllers and ABB
                components. Perkins is a well-known and reputable product in the
                generators??? market, catering the power needs in remote regions
                and extreme climates from Asia, Middle East, Africa and all over
                the world With an abundant stock of fast-moving spare parts and
                through our supply chain partners, we ensure consistent supply
                of Genuine Spare Parts & Accessories and that too with a minimal
                response time. Backed with excellent After Sales Support and
                Service from Extensive Dealer Network and fleet of well
                experienced engineers, Jubaili Bros is always ready to support
                its customers anytime anywhere. As a leading generator supplier,
                Jubaili Bros offers customized solutions. All you need to do is
                select the best solution for your projects / businesses and we
                will do the rest. We offer a wide selection of prime and standby
                models at both 50Hz and 60Hz for all applications with
                applicable voltage ranging from 380V to 415V for 50Hz uses and
                380V to 480V for 60Hz uses. These generating sets are of fixed
                speed of either 1500 rpm or 1800 rpm. JET Diesel Generators
                carry one year Warranty against manufacturing defects, which is
                in line with manufacturer???s Warranty terms and conditions. To
                know more about JET Brand Diesel Generators, please email us
                with your requirements.
              </Text>

              <table
                style={{
                  width: "70%",
                  margin: "auto",
                  padding: "1rem",
                  color: "rgb(136,142,148)",
                  fontSize: "0.9rem",
                  textAlign: "center",
                }}
                border="1"
                width="443"
                cellSpacing="10px"
                cellPadding="10px"
              >
                <tbody>
                  <tr>
                    <td rowSpan="3" colSpan={1} width="60">
                      Model
                    </td>
                  </tr>
                  <tr>
                    <td colSpan="2" width="50">
                      KVA
                    </td>
                    <td colSpan="1" width="50">
                      KW
                    </td>
                  </tr>
                  <tr>
                    <td width="60">RPM</td>
                    <td width="60">Prime</td>
                    <td width="60">Prime</td>
                  </tr>

                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI20
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>20.0</td>

                    <td>16.0</td>
                  </tr>
                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI30
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>30.0</td>

                    <td>24.0</td>
                  </tr>
                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI45
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>45.0</td>

                    <td>36.0</td>
                  </tr>
                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI60
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>60.0</td>

                    <td>48.0</td>
                  </tr>
                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI80
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>80.0</td>

                    <td>64.0</td>
                  </tr>
                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI100
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>100.0</td>

                    <td>80.0</td>
                  </tr>
                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI135
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>135.0</td>

                    <td>108.0</td>
                  </tr>
                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI150
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>150.0</td>

                    <td>120.0</td>
                  </tr>

                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI200
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>200.0</td>

                    <td>160.0</td>
                  </tr>

                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI300
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>308.0</td>

                    <td>246.4</td>
                  </tr>

                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI400
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>400.0</td>

                    <td>320.0</td>
                  </tr>

                  <tr>
                    <td>
                      <Text
                        color="rgb(136,142,148)"
                        fontSize="0.9rem"
                        mobileFontSize="0.8rem"
                        textAlign="center"
                      >
                        NI500
                      </Text>
                    </td>

                    <td>1500</td>
                    <td>500.0</td>

                    <td>400.0</td>
                  </tr>
                </tbody>
              </table>
            </Panel>
          </Collapse>

          <Collapse expandIconPosition="end">
            <Panel header={"Light Towel Generators"} key="8">
              <Text color="#808080" fontSize="0.9rem">
                NILECO Magnum leads the industry in innovative light tower
                solutions. Our vertical mast and compact light towers have
                revolutionized industrial mobile lighting. Easy to setup,
                operate and maintain, our light towers provide maximum power in
                a minimal footprint. With extended run times and service
                intervals, LED safety features, innovative engine technologies
                and programmable controls, our products can be trusted to
                maximize uptime and return on your investment. Durability,
                reliability and ease of use ??? put your trust in the largest
                light tower manufacturer in the world. With zero localized
                emissions and linking capability, LINKTower provides ultimate
                versatility in lighting events and jobsites ??? indoors and out.
                Compact, cost-effective LED light tower with an extended runtime
                for a wide variety of events and jobsites. Extended runtime LED
                light tower designed for remote locations and extreme
                temperatures. The NILECO AL???4 model line offers heavy-duty light
                towers to fit virtually any lighting need ??? from construction
                sites and sporting events to mining and oil field applications.
                The 30 ft (9.14 m) extended-height floodlight tower of the AL???4
                provides 4,000 Watts of light and is designed to maximize uptime
                with quick disconnect lights and ballasts, 359?? non-continuous
                tower rotation, heavy duty axles and chassis, and galvanized
                masts and outriggers.
              </Text>
              <Flex
                style={{ position: "relative" }}
                justifyContent="center"
                alignItems="center"
                justifyContentMobile="center"
                alignItemsMobile="center"
                width="100%"
              >
                {" "}
                <Carousel
                  ref={carouselRef}
                  style={{ height: "700px", width: "100%" }}
                >
                  <Flex
                    justifyContent="center"
                    height="500px"
                    width="800px"
                    position="relative"
                  >
                    <Image
                      objectFit="contain"
                      style={{ zIndex: "-1" }}
                      src={generator36}
                      alt="sliderImage"
                      layout="fill"
                      sizes="(min-width: 768px) 100vw,
              (max-width: 1200px) 50vw,
              33vw"
                    />
                  </Flex>
                </Carousel>
              </Flex>
            </Panel>
          </Collapse>
        </Flex>
      </Flex>
    </>
  );
}

// react slider component
