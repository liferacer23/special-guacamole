import React from "react";
import styled from "styled-components";
import titleBar from "../assets/titlebar-bg.jpg";
import { Flex, Text } from "../components/Base";
import { AiOutlineHome } from "react-icons/ai";
import Link from "next/link";
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
  h1 {
    font-size: 4rem;
    margin-bottom: 0;
  }
  p {
    font-size: 2rem;
    margin-top: 0;
  }
`;

const About = () => {
  return (
    <>
      <StyledDiv>
        <Flex direction="column">
          <Text
            fontSize="2rem"
            color="#fff"
            textAlign="center"
            fontWeight="bold"
          >
            About Us
          </Text>
          <Flex width="14%" justifyContent="center">
            <Link href="/">
              <Text
                color="#fff"
                fontSize="1rem"
                textAlign="center"
                fontWeight="bold"
                cursor="pointer"
              >
                <AiOutlineHome />
                Home
              </Text>
            </Link>
            /
            <Text
              fontSize="1rem"
              color="rgb(255, 199, 44)"
              textAlign="center"
              fontWeight="bold"
              cursor="pointer"
            >
              About Us
            </Text>{" "}
          </Flex>
        </Flex>
      </StyledDiv>
    </>
  );
};

export default About;
