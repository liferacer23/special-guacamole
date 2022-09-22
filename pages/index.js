import styles from "../styles/Home.module.css";
import Head from "next/head";
import NavBar from "../components/navbar";
import styled from "styled-components";
import Button from "antd/lib/button";
import Image from "next/image";
import volva from "../assets/vol.jpg";
import checklistbg from "../assets/checklistbg.png";
import generator from "../assets/generatorindex.jpeg";
const HeaderContainer = styled.div``;
const VolvaContainer = styled.div`
  height: 8rem;
  padding-left: 4rem;
  padding-top: 4rem;
`;
const AboutUsContainer = styled.div`
  display: flex;
  align-item: center;
  justify-content: center;
  gap: 10px;
  width: 100%;
  padding-left: 4rem;
  padding-top: 4rem;
`;
const Description = styled.div`
  display: flex;
  align-item: center;
  justify-content: start;
  flex-direction: column;
  width: 50%;
`;
const Text = styled.h1`
font-size:${(props) => props.fontSize || "14px"}};
color: ${(props) => props.color || "#000000"};
font-weight: ${(props) => props.fontWeight || "#000000"};
`;
const DeliverSection = styled.div`
  height: 30rem;
  width: 100%;
  background: blue;
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
  width: 50%;
  height: 100%;
  padding: 6rem;
`;

const DeliverSectionImage = styled.div`
  display: flex;
  align-item: center;
  justify-content: end;
  width: 50%;
  height: 100%;
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
          <div className={styles.SectionHorizontal}>
            <Button> About Us</Button>
            <Button> Contact Us</Button>
          </div>
        </div>
      </HeaderContainer>
      <VolvaContainer>
        <Image src={volva} width={200} height={100} alt="Volva image" />
      </VolvaContainer>

      <AboutUsContainer>
        <Image src={generator} width={500} height={600} alt="generator" />
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
          <Text fontSize="14px" color="#fff">
            WE DELIVER ON TIME ,ALL THE TIME
          </Text>
          <Text fontSize="30px" color="#fff">
            Great Experience For Building Construction & Outdoor Projects
          </Text>
          <Text fontSize="13px" color="#fff">
            The Easiest Way To Get What Need Need It Fast? We Can Help. We work
            to reduce air emissions industriel has a brilliant Capitalise on low
            hanging fruit to identify You get speed, flexibility and better
            control F
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
        </DeliverSectionDescription>
        <DeliverSectionImage>
          <Image
            style={{ opacity: 0.5 }}
            src={checklistbg}
            width={500}
            height={100}
          />
        </DeliverSectionImage>
      </DeliverSection>
    </>
  );
}
