import Head from "next/head";
import styled from "styled-components";
import Image from "next/image";
import checklistbg from "../assets/checklistbg.png";
import generator from "../assets/generator.jpeg";
import { GiCheckMark } from "react-icons/gi";
import { BsTools } from "react-icons/bs";
import { GoGlobe } from "react-icons/go";
import { BiPhoneCall } from "react-icons/bi";
import { GoMail } from "react-icons/go";
import { FaWpforms } from "react-icons/fa";
import { BiBuildings } from "react-icons/bi";
import { FaPencilRuler } from "react-icons/fa";
import { FaUsers } from "react-icons/fa";
import { HiUserGroup } from "react-icons/hi";
import { RiUserSettingsLine } from "react-icons/ri";
import AboutUs from "../assets/aboutus.jpg";
import generatorSingle from "../assets/generatorSingle.jpg";
import switchGear from "../assets/switchgear.jpg";
import hero from "../assets/hero.jpg";
import otherProducts from "../assets/otherProducts.jpg";
import { CgArrowLongRight } from "react-icons/cg";
import { Flex, Text, Button } from "../components/Base/";
import HomeSlider from "../components/HomeSlider";
const ImageContainer = styled.div`
  width: ${(props) => props.width || "500px"};
  height: ${(props) => props.height || "520px"};
  position: relative;
  @media (max-width: 1000px) {
    width: ${(props) => props.mobileWidth || "360px"};
    height: ${(props) => props.mobileHeight || "680px"};
  }
`;
const HeaderContainer = styled.div`
  position: relative;
  min-height: 90vh;
  min-width: 100vw;
  postion: relative;
  @media (max-width: 1000px) {
    min-height: 50vh;
  }
`;

const IconTextContainer = styled.div`
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: start;
  margin-bottom: 1.1rem;
`;
const AboutUsContainer = styled.div`
  display: flex;
  align-item: center;
  background: #fff;
  justify-content: center;
  width: 100%;
  height:30rem;
  gap: 2.2rem;
  margin-top: -15rem;
  @media (max-width: 1000px) {
    flex-direction: column;
    padding: 1rem;
    height:55rem;
  }
`;
const Description = styled.div`
  display: flex;
  align-item: center;
  justify-content: start;
  flex-direction: column;
  width: 40%;
  height: 100%;
  background: #fff;
  height:1rem
  padding-bottom: 2rem;
  @media (max-width: 1000px) {
    width: 100%;
  }
`;

const DeliverSection = styled.div`
  min-height: 30rem;
  width: 100%;
  background: rgba(0, 48, 100, 1);
  position: relative;
  display: flex;
  align-item: center;
  justify-content: start;
  @media (max-width: 1000px) {
    flex-direction: column;
    padding: 1rem;
  }
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
  @media (max-width: 1000px) {
    width: 100%;
    padding: 1rem;
  }
`;

const DeliverSectionImage = styled.div`
  display: flex;
  align-item: center;
  justify-content: end;
  width: 60%;
  height: 100%;
  position: absolute;
  right: 0;
  @media (max-width: 1000px) {
    width: 90%;
    height: 45%;
  }
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
  gap: 4rem;
  margin-top: 2rem;
`;

const Card = styled.div`
  display: flex;
  align-item: center;
  justify-content: start;
  flex-direction: column;
  width: 390px;
  height: 482px;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  margin-bottom: 1rem;
  @media (max-width: 1000px) {
    width: 320px;
  }
`;
const CardButton = styled("div")`
  margin-top: auto;
  height: 3rem;
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
  min-height: 37rem;
  position: relative;
  display: flex;
  align-item: center;
  @media (max-width: 768px) {
    flex-direction: column;
  }
`;
const AboutSectionInsideContainer = styled.div`
  width: 90vw;
  height: 50vw;
  padding: 2rem 0;
  @media (max-width: 768px) {
    width: 95%;
    height: 95%;
    padding: 5rem 0;
  }
`;
const AboutSectionDescription = styled.div`
  background: transparent;
  height: 100%;
  width: 70%;
  @media (max-width: 768px) {
    width: 100%;
    padding-top: 2rem;
  }
`;
const HospitalitySection = styled.div`
  min-height: 20rem;
  position: relative;
  display: flex;
  background: #fff;
  align-item: center;
  margin-top: -0.5rem;
  padding-top: 4rem;
  @media (max-width: 768px) {
    padding: 1rem;
  }
`;
const HeaderContent = styled.div`
  display: flex;
  position: absolute;
  justify-content: center;
  flex-direction: column;
  padding-left: 6rem;
  padding-top: 5rem;
  top: 1rem;
  left: 1rem;
  @media (max-width: 1000px) {
    padding: 5rem 1rem;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }
`;
const FooterHeader = styled.div`
  height: 30rem;
  @media (max-width: 1000px) {
    display: none;
  }
`;
const OrDiv = styled.div`
  position: absolute;
  font-size: 0.9rem;
  height: 30px;
  width: 30px;
  background: #fff;
  border-radius: 50%;
  color: rgb(1, 44, 90);
  top: 30%;
  display: flex;
  justify-content: center;
  align-items: center;
  left: -14px;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
`;
export default function Home() {
  // const [count1, setCount1] = useState(0);
  // const [count2, setCount2] = useState(0);
  // const [count3, setCount3] = useState(0);
  // const [count4, setCount4] = useState(0);
  // const [count5, setCount5] = useState(0);
  // const [count6, setCount6] = useState(0);
  // const [count7, setCount7] = useState(0);
  // useEffect(() => {
  //   const interval = setInterval(() => {
  //     if (count1 < 150) {
  //       setCount1(count1 + 1);
  //     }
  //     if (count2 < 11) {
  //       setCount2(count2 + 5);
  //     }
  //     if (count3 < 485) {
  //       setCount3(count3 + 5);
  //     }
  //     if (count4 < 500) {
  //       setCount4(count4 + 10);
  //     }
  //     if (count5 < 160) {
  //       setCount5(count5 + 5);
  //     }
  //     if (count6 < 80) {
  //       setCount6(count6 + 1);
  //     }
  //     if (count7 < 60) {
  //       setCount7(count7 + 1);
  //     }
  //   }, 100);
  //   return () => clearInterval(interval);
  // }, [
  //   count1,
  //   count2,
  //   count3,
  //   count4,
  //   setCount1,
  //   setCount2,
  //   setCount3,
  //   setCount4,
  // ]);

  return (
    <>
      <Head>
        <title>Nileco</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="description" content="Generated by create next app" />
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <HeaderContainer>
        <Image
          layout="fill"
          objectFit="cover"
          src={hero}
          alt="hero image.jpg"
          priority
          placeholder="blur"
          sizes="(min-width: 768px) 100vw,
            (max-width: 1200px) 50vw,
            33vw"
        />{" "}
        <HeaderContent>
          <Text
            mobileDisplay="none"
            fontSize={"16px"}
            color="rgb(253,201,55)"
            fontWeight="bold"
          >
            ---Welcome to Nileco---
          </Text>
          <Text
            fontSize={"3.4rem"}
            color="rgb(1,44,90)"
            fontWeight="bold"
            width="50vw"
            mobileWidth="100vw"
            mobileFontSize={"1.6rem"}
            hoverbackground="transparent"
          >
            We are leader in power and technology
          </Text>
          <Text
            mobileFontSize={"0.7rem"}
            fontSize={"18px"}
            color="white"
            fontWeight="bold"
          >
            We offer the most reliable power services in the country
          </Text>
          <HeaderButtonContainer>
            <Button
              background="rgb(253,201,55)"
              color="white"
              border="none"
              height="3rem"
              mobileHeight="2.5rem"
              mobileWidth="8rem"
              fontSize="1rem"
              mobileFontSize="0.7rem"
            >
              {" "}
              About Us
            </Button>
            <Button
              background="transparent"
              color="rgb(1,44,90)"
              border="1px solid rgb(1,44,90)"
              height="3rem"
              mobileHeight="2.5rem"
              mobileWidth="8rem"
              fontSize="1rem"
              mobileFontSize="0.7rem"
            >
              {" "}
              Contact Us
            </Button>
          </HeaderButtonContainer>
        </HeaderContent>
      </HeaderContainer>
      <>
        {" "}
        <HomeSlider />
      </>

      <AboutUsContainer>
        <ImageContainer>
          <Image
            placeholder="blur"
            src={generator}
            layout="fill"
            objectFit="contain"
            alt="generator"
            sizes="(min-width: 768px) 100vw,
            (max-width: 1200px) 50vw,
            33vw"
          />
        </ImageContainer>
        <Description>
          <Text fontSize="1.1rem" color="rgb(136,142,148)">
            About Us
          </Text>
          <Text
            fontWeight="bold"
            fontSize="2.2rem"
            mobileFontSize="2.2rem"
            color="rgb(1,44,90)"
            width="100%"
          >
            We Have Everything That You Needed
          </Text>
          <Text
            mobileFontSize="1rem"
            fontSize="0.9rem"
            color="rgb(136,142,148)"
            width="100%"
          >
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
          <Flex justifyContent="space-between" directionMobile="row">
            <Flex
              margin="10px 0 0 0"
              direction="column"
              alignItems="start"
              gap="3px"
            >
              <BiPhoneCall color="rgb(253,201,55)" fontSize="2rem" />
              <span style={{ fontSize: "0.9rem", color: "#000" }}>
                Phone Number
              </span>
              <span
                style={{
                  fontSize: "0.9rem",
                  color: "rgb(1,44,90)",
                  fontWeight: "bold",
                }}
              >
                +251977805757
              </span>
            </Flex>
            <Flex margin="0 -6rem 0 0" marginMobile="0 0 0 0">
              {" "}
              <div
                style={{
                  borderLeft: "1px solid rgb(1,44,90 , 0.2)",
                  height: "100px",
                  position: "relative",
                }}
              >
                <OrDiv>or</OrDiv>
              </div>
            </Flex>

            <Flex
              margin="10px 0 0 0"
              direction="column"
              alignItems="start"
              gap="3px"
            >
              <GoMail color="rgb(253,201,55)" fontSize="2rem" />
              <span style={{ fontSize: "1.1rem", color: "#000" }}>
                Email Address
              </span>
              <span
                style={{
                  fontSize: "0.9rem",
                  color: "rgb(1,44,90)",
                  fontWeight: "bold",
                }}
              >
                info@nilecoeem.com
              </span>
            </Flex>
          </Flex>
        </Description>
      </AboutUsContainer>
      <DeliverSection>
        <DeliverSectionDescription>
          {" "}
          <Flex direction="column">
            <Text
              fontWeight="bold"
              fontSize="14px"
              color="#fff"
              style={{ width: "100%" }}
            >
              WE DELIVER ON TIME ,ALL THE TIME
            </Text>
            <Text
              fontSize="37px"
              mobileFontSize="37px"
              fontWeight="bold"
              color="#fff"
              style={{ width: "100%" }}
            >
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
                  <Flex directionMobile="row" justifyContentMobile="start">
                    <BsTools
                      style={{ color: "rgb(255,199,44)", fontSize: "40px" }}
                    />
                    Product Listing
                  </Flex>
                  <Text
                    style={{
                      fontSize: "2rem",
                      color: "white",
                      fontWeight: "bold",
                    }}
                    mobileMargin="0rem 0 0 0rem"
                    mobileTextAlign="left"
                    mobileWidth="70%"
                  >
                    160
                  </Text>
                </Flex>
                <Flex direction="column">
                  <Flex directionMobile="row" justifyContentMobile="start">
                    <GoGlobe
                      style={{ color: "rgb(255,199,44)", fontSize: "40px" }}
                    />
                    Certifications & Award
                  </Flex>
                  <Text
                    style={{
                      fontSize: "2rem",
                      color: "white",
                      fontWeight: "bold",
                    }}
                    mobileMargin="0rem 0 0 0rem"
                    mobileTextAlign="left"
                    mobileWidth="70%"
                  >
                    80
                  </Text>
                </Flex>
                <Flex direction="column">
                  <Flex directionMobile="row" justifyContentMobile="start">
                    <FaWpforms
                      style={{ color: "rgb(255,199,44)", fontSize: "40px" }}
                    />
                    Brand Partners
                  </Flex>
                  <Text
                    style={{
                      fontSize: "2rem",
                      color: "white",
                      fontWeight: "bold",
                    }}
                    mobileMargin="0rem 0 0 0rem"
                    mobileTextAlign="left"
                    mobileWidth="70%"
                  >
                    60
                  </Text>
                </Flex>
              </Flex>
            </Flex>
          </Flex>
        </DeliverSectionDescription>
        <DeliverSectionImage>
          <div
            style={{ position: "relative", height: "700px", width: "600px" }}
          >
            <Image
              placeholder="blur"
              style={{ opacity: 0.2 }}
              src={checklistbg}
              layout="fill"
              objectFit="contain"
              sizes="(min-width: 768px) 100vw,
              (max-width: 1200px) 50vw,
              33vw"
              alt="checklist background"
            />
          </div>
        </DeliverSectionImage>
      </DeliverSection>
      <WorkingSection>
        <Text
          style={{
            fontSize: "1rem",
            color: "#808080",
            fontWeight: "bold",
            width: "100%",
            textAlign: "center",
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
            textAlign: "center",
          }}
        >
          Modern Electrical And Power Equipment Guaranteed
        </Text>
        <Flex
          direction="row"
          directionMobile="column"
          alignItems="center"
          justifyContent="center"
          padding="1rem"
        >
          <Card>
            {" "}
            <div
              style={{ position: "relative", width: "250px", height: "250px" }}
            >
              <Image
                placeholder="blur"
                src={generatorSingle}
                layout="fill"
                objectFit="contain"
                alt="generator Icon"
                sizes="(min-width: 768px) 100vw,
                (max-width: 1200px) 50vw,
                33vw"
              />
            </div>
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
                fontSize: "0.9rem",
                textAlign: "left",
                color: "#858585",
                width: "90%",
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
              <Flex
                background="rgb(255,199,44)"
                widthMobile="30%"
                width="30%"
                justifyContent="center"
              >
                <CgArrowLongRight style={{ fontSize: "30px", color: "#fff" }} />
              </Flex>
            </CardButton>
          </Card>
          <Card>
            {" "}
            <div
              style={{ position: "relative", width: "250px", height: "250px" }}
            >
              <Image
                placeholder="blur"
                src={switchGear}
                layout="fill"
                objectFit="contain"
                alt="switch gear"
                sizes="(min-width: 768px) 100vw,
                (max-width: 1200px) 50vw,
                33vw"
              />
            </div>
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
                fontSize: "0.9rem",
                textAlign: "left",
                color: "#858585",
                width: "90%",
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
              <Flex
                background="rgb(255,199,44)"
                widthMobile="30%"
                width="30%"
                justifyContent="center"
              >
                <CgArrowLongRight style={{ fontSize: "30px", color: "#fff" }} />
              </Flex>
            </CardButton>
          </Card>
          <Card>
            {" "}
            <div
              style={{ position: "relative", width: "250px", height: "250px" }}
            >
              <Image
                placeholder="blur"
                src={otherProducts}
                layout="fill"
                objectFit="contain"
                alt="other products"
                sizes="(min-width: 768px) 100vw,
                (max-width: 1200px) 50vw,
                33vw"
              />
            </div>
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
                fontSize: "0.9rem",
                textAlign: "left",
                color: "#858585",
                width: "90%",
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
              <Flex
                background="rgb(255,199,44)"
                widthMobile="30%"
                width="30%"
                justifyContent="center"
              >
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
          backgroundMobile="linear-gradient(180deg, rgb(255,199,44) 475px, rgba(0, 48, 100, 1) 0, rgba(0, 48, 100, 1) 70%);"
          height="100%"
        >
          <AboutSectionInsideContainer>
            <Flex justifyContent="space-between">
              <ImageContainer width="600px" height="750px">
                <Image
                  placeholder="blur"
                  priority
                  src={AboutUs}
                  layout="fill"
                  objectFit="contain"
                  alt="Volva image"
                  sizes="(min-width: 768px) 100vw,
                  (max-width: 1200px) 50vw,
                  33vw"
                />
              </ImageContainer>
              <AboutSectionDescription>
                <Flex
                  direction="column"
                  justifyContent="center"
                  justifyContentMobile="start"
                  alignItemsMobile=""
                >
                  <Text fontSize="1.5rem" width="100%" color="#fff">
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
                    directionMobile="row"
                  >
                    <BiBuildings
                      style={{ color: "rgb(255,199,44)", fontSize: "5rem" }}
                    />
                    <Flex direction="column" width="250px" gap="0px">
                      <Text
                        mobileFontSize="2.5rem"
                        fontSize="2.5rem"
                        color="white"
                        fontWeight="bold"
                      >
                        150
                      </Text>

                      <Text fontSize="0.9rem" color="white" fontWeight="bold">
                        Workers Employed
                      </Text>
                    </Flex>
                  </Flex>
                  <Flex
                    background="rgb(10,53,96)"
                    width="240px"
                    height="150px"
                    justifyContent="center"
                    alignItems="center"
                    padding="0px 20px"
                    directionMobile="row"
                  >
                    <FaPencilRuler
                      style={{ color: "rgb(255,199,44)", fontSize: "5rem" }}
                    />
                    <Flex direction="column" width="250px" gap="0px">
                      <Text
                        mobileFontSize="2.5rem"
                        fontSize="2.5rem"
                        color="white"
                        fontWeight="bold"
                      >
                        11
                      </Text>

                      <Text fontSize="0.9rem" color="white" fontWeight="bold">
                        Years of Experience
                      </Text>
                    </Flex>
                  </Flex>
                  <Flex
                    background="rgb(10,53,96)"
                    width="240px"
                    height="150px"
                    justifyContent="center"
                    alignItems="center"
                    padding="10px 20px"
                    directionMobile="row"
                  >
                    <FaUsers
                      style={{ color: "rgb(255,199,44)", fontSize: "5rem" }}
                    />
                    <Flex direction="column" width="250px" gap="0px">
                      <Text
                        mobileFontSize="2.5rem"
                        fontSize="2.5rem"
                        color="white"
                        fontWeight="bold"
                      >
                        485
                      </Text>

                      <Text fontSize="0.9rem" color="white" fontWeight="bold">
                        Happy Customers
                      </Text>
                    </Flex>
                  </Flex>
                  <Flex
                    background="rgb(10,53,96)"
                    width="240px"
                    height="150px"
                    justifyContent="center"
                    alignItems="center"
                    padding="0px 20px"
                    directionMobile="row"
                  >
                    <RiUserSettingsLine
                      style={{ color: "rgb(255,199,44)", fontSize: "5rem" }}
                    />
                    <Flex direction="column" width="250px" gap="0px">
                      <Text
                        mobileFontSize="2.5rem"
                        fontSize="2.5rem"
                        color="white"
                        fontWeight="bold"
                      >
                        500
                      </Text>

                      <Text fontSize="0.9rem" color="white" fontWeight="bold">
                        Project Served
                      </Text>
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
              width: "90%",
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
              width: "90%",
            }}
          >
            Our projects are fully tested, background checked, license validated
            and insured with a 100% satisfaction guarantee.
          </Text>
          <Flex justifyContent="center" margin="0 0 3rem 0">
            <Button width="11rem" height="3rem" background="rgb(255,199,44)">
              Visit our Office
            </Button>
            <Button
              width="16rem"
              height="3rem"
              background="transparent"
              color="rgba(0, 48, 100, 1)"
              border="2px solid rgba(0, 48, 100, 1)"
              mobileFontSize="0.9rem"
              fontSize="0.9rem"
            >
              <BiPhoneCall
                style={{ color: "rgba(0, 48, 100, 1)", fontSize: "1.2rem" }}
              />
              Call Us at +251977805757
            </Button>
          </Flex>
        </Flex>
      </HospitalitySection>
      <FooterHeader></FooterHeader>
    </>
  );
}
