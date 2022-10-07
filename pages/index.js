import styles from "../styles/Home.module.css";
import Head from "next/head";
import NavBar from "../components/navbar";
import styled from "styled-components";
import Button from "antd/lib/button";
import Image from "next/image";
import volva from "../assets/vol.jpg";
import checklistbg from "../assets/checklistbg.png";
import generator from "../assets/generator.jpeg";
import { GiCheckMark } from "react-icons/gi";
import { BsTools } from "react-icons/bs";
import { GoGlobe } from "react-icons/go";
import { FaWpforms } from "react-icons/fa";
import { BiBuildings } from "react-icons/bi";
import { FaPencilRuler } from "react-icons/fa";
import { FaUsers } from "react-icons/fa";
import { HiUserGroup } from "react-icons/hi";
import {BsFillTelephoneFill} from "react-icons/bs";
import { RiUserSettingsLine } from "react-icons/ri";
import AboutUs from "../assets/aboutus.jpg";
import generatorSingle from "../assets/generatorSingle.jpg";
import switchGear from "../assets/switchgear.jpg";

import otherProducts from "../assets/otherProducts.jpg";
import { CgArrowLongRight } from "react-icons/cg";
const Flex = styled.div`
  display: flex;
  text-align: ${(props) => props.align || "left"};
  flex-direction: ${(props) => props.direction || "row"};
  align-items: ${(props) => props.alignItems || "center"};
  justify-content: ${(props) => props.justifyContent || "start"};
  gap: ${(props) => props.gap || "10px"};
  flex-wrap: ${(props) => props.wrap || ""};
  width: ${(props) => props.width || "100%"};
  height: ${(props) => props.height || ""};
  padding: ${(props) => props.padding || "0px"};
  color: ${(props) => props.color || "#fff"};
  background: ${(props) => props.background || "transparent"};
  font-size: ${(props) => props.fontSize || "0.8rem"};
  font-weight: ${(props) => props.fontWeight || "400"};
`;

const HeaderContainer = styled.div``;
const IconTextContainer = styled.div`
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: start;
  margin-bottom: 1rem;
`;
const VolvaContainer = styled.div`
  height: 8rem;
  padding-left: 4rem;
  padding-top: 4rem;
`;
const AboutUsContainer = styled.div`
  display: flex;
  align-item: center;
  justify-content: center;
  gap: 40px;
  width: 100%;
  padding-left: 4rem;
  padding-top: 4rem;
`;
const Description = styled.div`
  display: flex;
  align-item: center;
  justify-content: start;
  flex-direction: column;
  width: 35%;
`;
const Text = styled.h1`
font-size:${(props) => props.fontSize || "14px"}};
color: ${(props) => props.color || "#000000"};
font-weight: ${(props) => props.fontWeight || "#000000"};
`;
const DeliverSection = styled.div`
  min-height: 30rem;
  width: 100%;
  background: rgba(0, 48, 100, 1);
  position: relative;
  display: flex;
  align-item: center;
  justify-content: start;
`;
const DeliverSectionDescription = styled.div`
  display: flex;
  align-item: center;
  justify-content: start;
  flex-direction: column;
  width: 60%;
  height: 100%;
  padding: 6rem;
  position: relative;
`;

const DeliverSectionImage = styled.div`
  display: flex;
  align-item: center;
  justify-content: end;
  width: 60%;
  height: 100%;
  position: absolute;
  right: 0;
`;
const WorkingSection = styled.div`
  min-height: 30rem;
  padding-top: 4rem;
  width: 100%;
  background: #fff;
  position: relative;
  display: flex;
  flex-direction: column;
  align-item: center;
  text-align: center;
  justify-content: start;
`;
const HeaderButtonContainer = styled.div`
  display: flex;
  align-item: center;
  gap: 3rem;
`;
const StyledButton = styled(Button)`
  background: ${(props) => props.background || "#fff"};
  color: ${(props) => props.color || "#fff"};
  border: 2px solid ${(props) => props.border || "#fff"};
  height: ${(props) => props.height || "2.5rem"};
  width: ${(props) => props.width || "10rem"};
  padding: ${(props) => props.padding || "10px"};
  display: flex;
  align-item: center;
  justify-content: center;
  font-weight: ${(props) => props.fontWeight || "bold"};
  gap: 1rem;
  font-size: ${(props) => props.fontSize || "0.8rem"};

`;
const Card = styled.div`
  display: flex;
  align-item: center;
  justify-content: start;
  flex-direction: column;
  width: 390px;
  height: 562px;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  margin-bottom: 1rem;
`;
const CardButton = styled("div")`
  margin-top: auto;
  height: 3.5rem;
  line-height: 3.5rem;
  background: rgb(244, 245, 244);
  width: 100%;
  display: flex;
  align-item: center;
  justify-content: space-between;
  padding-left: 1rem;
  transition: 0.6s;
  &:hover {
    background: rgb(255, 199, 44);
    div {
      transition: 0.6s;
      background: rgba(0, 48, 100, 1);
    }
  }
  cursor: pointer;
`;
const InnerText = styled("span")`
  color: rgba(0, 48, 100, 1);
  transition: 0.6s;
  padding-left: 10px;
  &:hover {
    color: rgb(255, 199, 44);
  }
`;
const AboutSection = styled.div`
  min-height: 40rem;
  position: relative;
  display: flex;
  align-item: center;
  margin-top: 4rem;
`;
const AboutSectionInsideContainer = styled.div`
  width: 80%;
  height: 80%;
  padding: 4rem 0;
`;
const AboutSectionDescription = styled.div`
  background: transparent;
  height: 100%;
  width: 70%;
`;
const HospitalitySection = styled.div`
  min-height: 20rem;
  position: relative;
  display: flex;
  align-item: center;
  margin-top: 4rem;
`;
export default function Home() {
  return (
    <>
      <Head>
        <title>Nilec</title>
        <meta name="description" content="Generated by create next app" />
        <link rel="icon" href="/favicon.ico" />
      </Head>
      <NavBar />
      <HeaderContainer className={styles.Section}>
        <div className={styles.SectionVertical}>
          <Text fontSize={"14px"} color="yellow">
            --Welcome to Nileco--
          </Text>
          <Text fontSize={"50px"} color="blue">
            We are leader in power and technology
          </Text>
          <Text fontSize={"18px"} color="white">
            We offer the most reliable power services in the country
          </Text>
          <HeaderButtonContainer>
            <StyledButton background="yellow" color="white" border="none">
              {" "}
              About Us
            </StyledButton>
            <StyledButton background="transparent" color="blue" border="blue">
              {" "}
              Contact Us
            </StyledButton>
          </HeaderButtonContainer>
        </div>
      </HeaderContainer>
      <VolvaContainer>
        <Image src={volva} width={200} height={100} alt="Volva image" />
      </VolvaContainer>

      <AboutUsContainer>
        <Image src={generator} width={400} height={500} alt="generator" />
        <Description>
          <Text fontSize="14px">About Us</Text>
          <Text fontSize="30px">We Have Everything That You Needed</Text>
          <Text fontSize="13px">
            Nileco Electric Equipment Manufacturing PLC is your ultimate
            solution provider of generators, switchgears, and electrical spare
            parts.
            <br />
            <br />
            Committed to delivering satisfaction and competence, we at Nileco
            strive to look after our clients’ energy needs.
            <br />
            <br />
            Aenean tincidunt id mauris id auctor. an countries during the
            Industrial mercantile and feudal economies.ThDonec atnissim quis
            neque inter dum, quis porta sem ng the Industria
          </Text>
        </Description>
      </AboutUsContainer>
      <DeliverSection>
        <DeliverSectionDescription>
          {" "}
          <Flex direction="column">
            <Text fontSize="14px" color="#fff" style={{ width: "100%" }}>
              WE DELIVER ON TIME ,ALL THE TIME
            </Text>
            <Text fontSize="30px" color="#fff" style={{ width: "100%" }}>
              Great Experience For Building Construction & Outdoor Projects
            </Text>
            <Flex justifyContent="start">
              <Text fontSize="13px" color="#fff">
                <IconTextContainer>
                  <GiCheckMark
                    style={{ color: "rgb(255,199,44)", marginRight: "10px" }}
                  />
                  The Easiest Way To Get What Need
                  <br />
                </IconTextContainer>
                <IconTextContainer>
                  <GiCheckMark
                    style={{ color: "rgb(255,199,44)", marginRight: "10px" }}
                  />
                  Need It Fast? We Can Help.
                  <br />
                </IconTextContainer>
                <IconTextContainer>
                  <GiCheckMark
                    style={{ color: "rgb(255,199,44)", marginRight: "10px" }}
                  />
                  We work to reduce air emissions
                  <br />
                </IconTextContainer>
              </Text>
              <Text fontSize="13px" color="#fff">
                <IconTextContainer>
                  <GiCheckMark
                    style={{ color: "rgb(255,199,44)", marginRight: "10px" }}
                  />
                  industriel has a brilliant
                  <br />
                </IconTextContainer>
                <IconTextContainer>
                  <GiCheckMark
                    style={{ color: "rgb(255,199,44)", marginRight: "10px" }}
                  />
                  Capitalise on low hanging fruit to identify
                  <br />
                </IconTextContainer>
                <IconTextContainer>
                  <GiCheckMark
                    style={{ color: "rgb(255,199,44)", marginRight: "10px" }}
                  />
                  You get speed, flexibility and better control
                  <br />
                </IconTextContainer>
              </Text>
            </Flex>
            <hr style={{ width: "100%", opacity: "0.2" }} />
            <Flex direction="column">
              <Flex>
                <Flex direction="column">
                  <Flex>
                    <BsTools
                      style={{ color: "rgb(255,199,44)", fontSize: "30px" }}
                    />
                    Product Listings
                  </Flex>
                  <Text
                    style={{
                      fontSize: "1.9rem",
                      color: "white",
                      fontWeight: "bold",
                    }}
                  >
                    160
                  </Text>
                </Flex>
                <Flex direction="column">
                  <Flex>
                    <GoGlobe
                      style={{ color: "rgb(255,199,44)", fontSize: "30px" }}
                    />
                    Certifications & Award
                  </Flex>
                  <Text
                    style={{
                      fontSize: "1.9rem",
                      color: "white",
                      fontWeight: "bold",
                    }}
                  >
                    80
                  </Text>
                </Flex>
                <Flex direction="column">
                  <Flex>
                    <FaWpforms
                      style={{ color: "rgb(255,199,44)", fontSize: "30px" }}
                    />
                    Brand Partners
                  </Flex>
                  <Text
                    style={{
                      fontSize: "1.9rem",
                      color: "white",
                      fontWeight: "bold",
                    }}
                  >
                    60
                  </Text>
                </Flex>
              </Flex>
            </Flex>
          </Flex>
        </DeliverSectionDescription>
        <DeliverSectionImage>
          <Image
            style={{ opacity: 0.2 }}
            src={checklistbg}
            width={700}
            height={600}
            alt="checklist background"
          />
        </DeliverSectionImage>
      </DeliverSection>
      <WorkingSection>
        <Text
          style={{
            fontSize: "1rem",
            color: "#808080",
            fontWeight: "bold",
            width: "100%",
          }}
        >
          WORKING WITH EXCELLENT
        </Text>

        <Text
          style={{
            fontSize: "2.4rem",
            color: "rgba(0, 48, 100, 1)",
            fontWeight: "bold",
            width: "100%",
          }}
        >
          Modern Electrical And Power Equipment Guaranteed
        </Text>
        <Flex justifyContent="center">
          <Card>
            {" "}
            <Image
              style={{ opacity: 1 }}
              src={generatorSingle}
              width={250}
              height={250}
              alt="generator Icon"
            />
            <Text
              style={{
                fontSize: "1.5rem",
                textAlign: "left",
                color: "rgba(0, 48, 100, 1)",
                fontWeight: "bold",
                width: "100%",
                marginTop: "20px",
              }}
            >
              <InnerText>Generators</InnerText>{" "}
            </Text>
            <Text
              style={{
                fontSize: "1rem",
                textAlign: "left",
                color: "#858585",
                width: "100%",
                marginTop: "20px",
                marginLeft: "10px",
              }}
            >
              Our diesel generators comprise of a Diesel Engine coupled to an
              Alternator, mounted over a common base frame with Anti-Vibration
              mounting
            </Text>
            <CardButton>
              <Text
                style={{
                  width: "100%",
                  fontSize: "1rem",
                  fontWeight: "bold",
                  color: "rgba(0, 48, 100, 1)",
                }}
              >
                Learn More
              </Text>
              <Flex width="30%" justifyContent="center">
                <CgArrowLongRight style={{ fontSize: "30px", color: "#fff" }} />
              </Flex>
            </CardButton>
          </Card>
          <Card>
            {" "}
            <Image
              style={{ opacity: 1 }}
              src={switchGear}
              width={250}
              height={250}
              alt="switch gear"
            />
            <Text
              style={{
                fontSize: "1.5rem",
                textAlign: "left",
                color: "rgba(0, 48, 100, 1)",
                fontWeight: "bold",
                width: "100%",
                marginTop: "20px",
              }}
            >
              <InnerText>Switch Gears</InnerText>{" "}
            </Text>
            <Text
              style={{
                fontSize: "1rem",
                textAlign: "left",
                color: "#858585",
                width: "100%",
                marginTop: "20px",
                marginLeft: "10px",
              }}
            >
              Switchgears are effective solutions for a client seeking power at
              cyclic conditions or generally to get efficient higher rating
              power.
            </Text>
            <CardButton>
              <Text
                style={{
                  width: "100%",
                  fontSize: "1rem",
                  fontWeight: "bold",
                  color: "rgba(0, 48, 100, 1)",
                }}
              >
                Learn More
              </Text>
              <Flex width="30%" justifyContent="center">
                <CgArrowLongRight style={{ fontSize: "30px", color: "#fff" }} />
              </Flex>
            </CardButton>
          </Card>
          <Card>
            {" "}
            <Image
              style={{ opacity: 1 }}
              src={otherProducts}
              width={250}
              height={250}
              alt="other products"
            />
            <Text
              style={{
                fontSize: "1.5rem",
                textAlign: "left",
                color: "rgba(0, 48, 100, 1)",
                width: "100%",
                marginTop: "20px",
              }}
            >
              <InnerText>Other Products</InnerText>
            </Text>
            <Text
              style={{
                fontSize: "1rem",
                textAlign: "left",
                color: "#858585",
                width: "100%",
                marginTop: "20px",
                marginLeft: "10px",
              }}
            >
              We provide quality and genuine spare parts paired with efficient
              after-sales service to keep your machines in great condition
            </Text>
            <CardButton>
              <Text
                style={{
                  width: "100%",
                  fontSize: "1rem",
                  fontWeight: "bold",
                  color: "rgba(0, 48, 100, 1)",
                }}
              >
                Learn More
              </Text>
              <Flex width="30%" justifyContent="center">
                <CgArrowLongRight style={{ fontSize: "30px", color: "#fff" }} />
              </Flex>
            </CardButton>
          </Card>
        </Flex>
      </WorkingSection>
      <AboutSection>
        <Flex
          justifyContent="center"
          background="linear-gradient(90deg, rgb(255,199,44) 375px, rgba(0, 48, 100, 1) 0, rgba(0, 48, 100, 1) 70%);"
          width="100%"
          height="100%"
        >
          <AboutSectionInsideContainer>
            <Flex justifyContent="space-between">
              <Image src={AboutUs} width={700} height={712} alt="Volva image" />
              <AboutSectionDescription>
                <Flex direction="column" justifyContent="center">
                  <Text
                    style={{ fontSize: "1.5rem", width: "100%", color: "#fff" }}
                  >
                    ABOUT US
                  </Text>
                  <Text
                    style={{
                      fontSize: "2rem",
                      width: "100%",
                      color: "#fff",
                      fontWeight: "bold",
                    }}
                  >
                    Here At NILECO, We Value Quality And Customer Feedback
                  </Text>
                  <Text
                    style={{ fontSize: "1.1rem", width: "100%", color: "#fff" }}
                  >
                    Your partner in energy and power
                  </Text>
                </Flex>
                <Flex gap="20px" wrap="wrap" justifyContent="center">
                  <Flex
                    background="rgb(10,53,96)"
                    width="240px"
                    height="150px"
                    justifyContent="center"
                    alignItems="center"
                    padding="0px 20px"
                  >
                    <BiBuildings
                      style={{ color: "rgb(255,199,44)", fontSize: "5rem" }}
                    />
                    <Flex direction="column" width="250px" gap="0px">
                      <span
                        style={{
                          fontSize: "2.5rem",
                          color: "white",
                          fontWeight: "bold",
                        }}
                      >
                        150
                      </span>

                      <span
                        style={{
                          fontSize: "0.9rem",
                          color: "white",
                          fontWeight: "bold",
                        }}
                      >
                        Worker Employed
                      </span>
                    </Flex>
                  </Flex>
                  <Flex
                    background="rgb(10,53,96)"
                    width="240px"
                    height="150px"
                    justifyContent="center"
                    alignItems="center"
                    padding="0px 20px"
                  >
                    <FaPencilRuler
                      style={{ color: "rgb(255,199,44)", fontSize: "5rem" }}
                    />
                    <Flex direction="column" width="250px" gap="0px">
                      <span
                        style={{
                          fontSize: "2.5rem",
                          color: "white",
                          fontWeight: "bold",
                        }}
                      >
                        11
                      </span>

                      <span
                        style={{
                          fontSize: "0.9rem",
                          color: "white",
                          fontWeight: "bold",
                        }}
                      >
                        Years of Experience
                      </span>
                    </Flex>
                  </Flex>
                  <Flex
                    background="rgb(10,53,96)"
                    width="240px"
                    height="150px"
                    justifyContent="center"
                    alignItems="center"
                    padding="0px 20px"
                  >
                    <FaUsers
                      style={{ color: "rgb(255,199,44)", fontSize: "5rem" }}
                    />
                    <Flex direction="column" width="250px" gap="0px">
                      <span
                        style={{
                          fontSize: "2.5rem",
                          color: "white",
                          fontWeight: "bold",
                        }}
                      >
                        485
                      </span>

                      <span
                        style={{
                          fontSize: "0.9rem",
                          color: "white",
                          fontWeight: "bold",
                        }}
                      >
                        Happy Customers
                      </span>
                    </Flex>
                  </Flex>
                  <Flex
                    background="rgb(10,53,96)"
                    width="240px"
                    height="150px"
                    justifyContent="center"
                    alignItems="center"
                    padding="0px 20px"
                  >
                    <RiUserSettingsLine
                      style={{ color: "rgb(255,199,44)", fontSize: "5rem" }}
                    />
                    <Flex direction="column" width="250px" gap="0px">
                      <span
                        style={{
                          fontSize: "2.5rem",
                          color: "white",
                          fontWeight: "bold",
                        }}
                      >
                        500
                      </span>

                      <span
                        style={{
                          fontSize: "0.9rem",
                          color: "white",
                          fontWeight: "bold",
                        }}
                      >
                        Projects Served
                      </span>
                    </Flex>
                  </Flex>
                </Flex>
              </AboutSectionDescription>
            </Flex>
          </AboutSectionInsideContainer>
        </Flex>
      </AboutSection>
      <HospitalitySection>
        <Flex direction="column" justifyContent="center">
          <HiUserGroup style={{ color: "rgb(1,44,90)", fontSize: "6rem" }} />
          <Text
            style={{
              color: "rgb(1,44,90)",
              fontSize: "2.7rem",
              textAlign: "center",
              fontWeight: "bold",
              width: "70%",
            }}
          >
            Trusted In Construction, Hospitality, and other engineering projects
          </Text>
          <Text
            style={{
              color: "rgb(125,135,145)",
              fontSize: "1.0rem",
              textAlign: "center",
              fontWeight: "bold",
              width: "70%",
            }}
          >
            Our projects are fully tested, background checked, license validated
            and insured with a 100% satisfaction guarantee.
          </Text>
          <Flex justifyContent="center">
          <StyledButton width="15rem" height="3rem" background="rgb(255,199,44)">Visit our Office</StyledButton>
          <StyledButton width="15rem" height="3rem" background=" rgba(0, 48, 100, 1)" ><BsFillTelephoneFill style={{color:"rgb(255,199,44)",fontSize:"1rem"}}/>Call Us at +251977805757</StyledButton>
          </Flex>
        </Flex>
      </HospitalitySection>
    </>
  );
}
